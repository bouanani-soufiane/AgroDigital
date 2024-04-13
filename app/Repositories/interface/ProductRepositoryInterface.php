<?php

namespace App\Repositories\interface;

use App\DTO\ProductDTO;
use App\Models\Product;


interface ProductRepositoryInterface
{
    public function all();

    public function store(ProductDTO $DTO);

    public function show(Product $product);

    public function update(Product $product, ProductDTO $DTO);

    public function delete(Product $product);
}
