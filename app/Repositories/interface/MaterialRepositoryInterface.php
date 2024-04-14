<?php

namespace App\Repositories\interface;

use App\DTO\MaterialDTO;
use App\Models\Material;


interface MaterialRepositoryInterface
{
    public function all();

    public function store(MaterialDTO $DTO);

    public function show(Material $material);

    public function update(Material $material, MaterialDTO $DTO);

    public function delete(Material $material);
}
