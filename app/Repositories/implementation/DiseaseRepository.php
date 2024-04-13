<?php

namespace App\Repositories\implementation;

use App\Models\Disease;
use App\Repositories\interface\DiseaseRepositoryInterface;
use App\DTO\DiseaseDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\UnauthorizedException;

class DiseaseRepository  implements DiseaseRepositoryInterface
{
    public function all()
    {
        return Disease::all();
    }

    public function store(DiseaseDTO $DTO)
    {
        try {
            $disease = Disease::create($this->getArr($DTO));
            return $disease;
        } catch (\Exception $e) {
            throw new \RuntimeException("Error creating Disease: " . $e->getMessage());
        }
    }

    public function show(Disease $disease)
    {
        try {
            return $disease;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("User not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function update(Disease $disease, DiseaseDTO $DTO)
    {
        try {
            return $disease->update($this->getArr($DTO));
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("disease not found: " . $e->getMessage(), $e->getCode(), $e);
        } catch (UnauthorizedException $e) {
            throw new \RuntimeException("Validation error: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function delete(Disease $disease)
    {
        try {
            return $disease->delete();
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("disease not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }
    private function getArr(DiseaseDTO $DTO): array
    {
        return [
            "name" => $DTO->name,
            "description" => $DTO->description,
            "type" => $DTO->type,
        ];
    }
}
