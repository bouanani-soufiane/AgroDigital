<?php

namespace App\Repositories\implementation;

use App\Models\Product;
use App\Repositories\interface\ProductRepositoryInterface;
use App\DTO\ProductDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\UnauthorizedException;

class ProductRepository  implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::orderBy('updated_at', 'desc')->with('employee' , 'image')->get();
    }

    public function store(ProductDTO $DTO)
    {
        try {
            $product = Product::create($this->getArr($DTO));
            return $product;
        } catch (\Exception $e) {
            throw new \RuntimeException("Error creating Product: " . $e->getMessage());
        }
    }

    public function show(Product $product)
    {
        try {
            return $product;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("User not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function update(Product $product, ProductDTO $DTO)
    {

        try {
            $product->update($this->getArr($DTO));
            return $product;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Product not found: " . $e->getMessage(), $e->getCode(), $e);
        } catch (UnauthorizedException $e) {
            throw new \RuntimeException("Validation error: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function delete(Product $product)
    {
        try {
            return $product->delete();
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Product not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }
    private function getArr(ProductDTO $DTO): array
    {
        return [
            "name" => $DTO->name,
            "quantity" => $DTO->quantity,
            "type" => $DTO->type,
            "employee_id" => $DTO->employee_id
        ];
    }
}
