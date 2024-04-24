<?php

namespace App\Services\Implementation;

use App\DTO\ProductDTO;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Services\contract\ImageServiceInterface;
use App\Services\contract\ProductServiceInterface;
use App\Repositories\interface\ProductRepositoryInterface;

class ProductService implements ProductServiceInterface
{

    public function __construct(
        public ProductRepositoryInterface $repository,
        public ImageServiceInterface   $imageService,
    ) {
    }
    public function all()
    {
        return ProductResource::collection($this->repository->all());
    }

    public function store(ProductDTO $DTO)
    {

        $program = $this->repository->store($DTO);
        $this->imageService->create($program, $DTO->image);
        return new ProductResource($program);
    }

    public function show(Product $product)
    {
        return new ProductResource($this->repository->show($product));
    }

    public function update(Product $product, ProductDTO $DTO)
    {
        $this->repository->update($product, $DTO);
        return new ProductResource($product);
    }

    public function delete(Product $product)
    {
        return $this->repository->delete($product);
    }
}
