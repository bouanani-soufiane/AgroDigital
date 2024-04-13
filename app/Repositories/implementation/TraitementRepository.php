<?php

namespace App\Repositories\implementation;

use App\Models\Traitement;
use App\Repositories\interface\TraitementRepositoryInterface;
use App\DTO\TraitementDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\UnauthorizedException;

class TraitementRepository implements TraitementRepositoryInterface
{
    public function all(): Collection
    {
        return Traitement::all();
    }

    public function store(TraitementDTO $DTO): Traitement
    {
        try {
            $traitement = Traitement::create($this->getArr($DTO));
            return $traitement;
        } catch (\Exception $e) {
            throw new \RuntimeException("Error creating Traitement: " . $e->getMessage());
        }
    }

    public function show(Traitement $traitement): Traitement
    {
        try {
            return $traitement;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("User not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function update(Traitement $traitement, TraitementDTO $DTO)
    {
        try {
            return $traitement->update($this->getArr($DTO));
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Traitement not found: " . $e->getMessage(), $e->getCode(), $e);
        } catch (UnauthorizedException $e) {
            throw new \RuntimeException("Validation error: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function delete(Traitement $traitement)
    {
        try {
            return $traitement->delete();
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Traitement not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    private function getArr(TraitementDTO $DTO): array
    {
        return [
            "name" => $DTO->name,
            "dateStart" => $DTO->dateStart,
            "dateEnd" => $DTO->dateEnd,
            "product_id" => $DTO->product_id,
            "employee_id" => $DTO->employee_id
        ];
    }
}
