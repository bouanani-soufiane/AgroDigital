<?php

namespace App\Services\Implementation;

use App\DTO\ProductDTO;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Services\contract\ProductServiceInterface;
use App\Repositories\interface\ProductRepositoryInterface;

class ProductService implements ProductServiceInterface
{

    public function __construct(public ProductRepositoryInterface $repository)
    {
    }
    public function all()
    {
        return ProductResource::collection($this->repository->all());
    }

    public function store(ProductDTO $DTO)
    {
        return new ProductResource($this->repository->store($DTO));
    }

    public function show(Product $product)
    {
        return new ProductResource($this->repository->show($product));
    }

    public function update(Product $product, ProductDTO $DTO)
    {
        return $this->repository->update($product, $DTO);
    }

    public function delete(Product $product)
    {
        return $this->repository->delete($product);
    }
}
