<?php

namespace App\Repositories\interface;

use Illuminate\Database\Eloquent\Model;


interface ImageRepositoryInterface
{
    public function create(Model $model, $image);

    public function insert(Model $model,  $images);

    public function update(Model $model, $image);
}
