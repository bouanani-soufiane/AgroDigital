<?php

namespace App\Repositories\interface;

use App\DTO\DiseaseDTO;
use App\Models\Disease;

interface DiseaseRepositoryInterface
{
    public function all();

    public function store(DiseaseDTO $DTO);

    public function show(Disease $disease);

    public function update(Disease $disease, DiseaseDTO $DTO);

    public function delete(Disease $disease);
}
