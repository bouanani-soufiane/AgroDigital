<?php

namespace App\Services\contract;

use App\DTO\ProductDTO;
use App\Models\Product;

interface ProductServiceInterface
{
    public function all();
    public function store(ProductDTO $DTO);
    public function show(Product $product);
    public function update(Product $product, ProductDTO $DTO);
    public function delete(Product $product);
}
