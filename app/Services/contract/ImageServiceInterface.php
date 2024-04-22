<?php

namespace App\Services\contract;

use Illuminate\Database\Eloquent\Model;


interface ImageServiceInterface
{
    public function create(Model $model, object $image);
    public function insert(Model $model, array $images);

    public function update(Model $model, object $image);
}
