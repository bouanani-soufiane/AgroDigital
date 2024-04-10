<?php

namespace App\Services\contract;

use App\DTO\TraitementDTO;
use App\Models\Traitement;

interface TraitementServiceInterface
{
    public function all();

    public function store(TraitementDTO $DTO);
    public function show(Traitement $traitement);
    public function update(Traitement $traitement, TraitementDTO $DTO);
    public function delete(Traitement $traitement);
}
