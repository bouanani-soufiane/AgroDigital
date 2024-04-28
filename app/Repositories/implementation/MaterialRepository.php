<?php

namespace App\Repositories\implementation;

use App\Models\Material;
use App\Repositories\interface\MaterialRepositoryInterface;
use App\DTO\MaterialDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\UnauthorizedException;

class MaterialRepository  implements MaterialRepositoryInterface
{
    public function all()
    {
        return Material::orderBy('created_at', 'desc')->with('employee')->get();
    }

    public function store(MaterialDTO $DTO)
    {
        try {
            $Material = Material::create($this->getArr($DTO));
            return $Material;
        } catch (\Exception $e) {
            throw new \RuntimeException("Error creating Material: " . $e->getMessage());
        }
    }

    public function show(Material $Material)
    {
        try {
            return $Material;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("User not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function update(Material $Material, MaterialDTO $DTO)
    {
        try {
            return $Material->update($this->getArr($DTO));
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Material not found: " . $e->getMessage(), $e->getCode(), $e);
        } catch (UnauthorizedException $e) {
            throw new \RuntimeException("Validation error: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function delete(Material $Material)
    {
        try {
            return $Material->delete();
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Material not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }
    private function getArr(MaterialDTO $DTO): array
    {
        return [
            "name" => $DTO->name,
            'quantity' => $DTO->quantity,
            'type' => $DTO->type,
            'manufacturer' => $DTO->manufacturer,
            'purchase_date' => $DTO->purchase_date,
            'employee_id' => $DTO->employee_id,
        ];
    }
}
