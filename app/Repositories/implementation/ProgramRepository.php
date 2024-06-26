<?php

namespace App\Repositories\implementation;

use App\Models\Stage;
use App\Models\Cultur;
use App\DTO\ProgramDTO;
use App\Models\Program;
use App\Models\Attribute;
use App\DTO\FinishProgramDTO;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\interface\ProgramRepositoryInterface;

class ProgramRepository  implements ProgramRepositoryInterface
{
    public function all()
    {
        return Program::orderBy('id', 'asc')->get();
    }


    public function store(ProgramDTO $DTO)
    {
        $cultur = Cultur::create([
            "cultur_name" => $DTO->cultur_name,
        ]);

        $program = Program::create([
            "program_name" => $DTO->program_name,
            "cultur_id" => $cultur->id,
        ]);

        $stage_ids = [];
        foreach ($DTO->stage_name as $index => $stageName) {

            $stage = Stage::create([
                'stage_name' => $stageName,
                'stage_duration' => $DTO->stage_duration[$index]
            ]);
            $stage_ids[] = $stage->id;
        }

        foreach ($DTO->attribute_name as $attributeName) {
            foreach ($stage_ids as $stageId) {
                Attribute::create([
                    'attribute_name' => $attributeName,
                    'program_id' => $program->id,
                    "stage_id" => $stageId,
                ]);
            }
        }
        return $program;
    }

    public function finish(FinishProgramDTO $DTO)
    {
        try {
            foreach ($DTO->programData as $i => $programData) {
                if ($programData['attribute'] != null) {
                    DB::table('attributes')
                        ->where('attribute_name', $programData['attribute'])
                        ->where('program_id', $programData['programId'])
                        ->where('stage_id', $programData['stageId'])
                        ->update(['attribute_value' => $programData['value']]);
                }
            }
            return true;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("cant add values: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function show(Program $Program)
    {
        try {
            return $Program;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("User not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function update(Program $Program, ProgramDTO $DTO)
    {
        try {
            $cultur = Cultur::updateOrCreate(["cultur_name" => $DTO->cultur_name,]);

            $Program->update([
                "program_name" => $DTO->program_name,
                "cultur_id" => $cultur->id,
            ]);
            $stage_ids = Attribute::where('program_id', $Program->id)->pluck('stage_id')->toArray();
            Attribute::where('program_id', $Program->id)->delete();
            foreach (array_unique($stage_ids) as $i => $attribId) {
                $stage = Stage::find($attribId);
                $stage->delete();
            }

            foreach ($DTO->stage_name as $stageName) {

                $stage = Stage::create([
                    'stage_name' => $stageName,
                ]);
                $stage_idstage[] = $stage->id;
            }

            Attribute::where('program_id', $Program->id)->delete();

            foreach ($DTO->attribute_name as $attributeName) {
                foreach (array_unique($stage_idstage) as $stageId) {
                    Attribute::create([
                        'attribute_name' => $attributeName,
                        'program_id' => $Program->id,
                        "stage_id" => $stageId,
                    ]);
                }
            }
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Program not found: " . $e->getMessage(), $e->getCode(), $e);
        } catch (UnauthorizedException $e) {
            throw new \RuntimeException("Validation error: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function delete(Program $Program)
    {
        try {
            $stage_ids = Attribute::where('program_id', $Program->id)->pluck('stage_id')->toArray();
            foreach (array_unique($stage_ids) as $i => $attribId) {
                $stage = Stage::find($attribId);
                $stage->delete();
            }
            Attribute::where('program_id', $Program->id)->delete();
            $Program->stage()->detach();
            $Program->delete();

            return true;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Program not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }
}
