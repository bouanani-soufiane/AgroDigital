<?php

namespace App\Services\Implementation;


use App\Repositories\interface\ImageRepositoryInterface;
use App\Services\contract\ImageServiceInterface;
use Illuminate\Database\Eloquent\Model;

class ImageService implements ImageServiceInterface
{
    public function __construct(public ImageRepositoryInterface $repository)
    {
    }

    public function create(Model $model, object $image)
    {
        $this->repository->create($model, $image);
    }

    public function insert(Model $model, array $images)
    {
        $this->repository->insert($model, $images);
    }

    public function update(Model $model, object $image)
    {
        $this->repository->update($model, $image);
    }

}
