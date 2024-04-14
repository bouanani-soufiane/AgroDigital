<?php

namespace App\Services\contract;

use App\DTO\MaterialDTO;
use App\Models\Material;

interface MaterialServiceInterface
{
    public function all();
    public function store(MaterialDTO $DTO);
    public function show(Material $material);
    public function update(Material $material, MaterialDTO $DTO);
    public function delete(Material $material);
}
