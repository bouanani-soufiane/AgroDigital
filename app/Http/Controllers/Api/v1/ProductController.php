<?php

namespace App\Http\Controllers\Api\v1;

use App\DTO\ProductDTO;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\contract\ProductServiceInterface;
use App\Http\Controllers\Api\v1\BaseApiController;

class ProductController extends BaseApiController
{
    public function __construct(public ProductServiceInterface $service)
    {
    }

    public function index()
    {
        $products = $this->service->all();
        return response()->json($products, 200);
    }


    public function store(StoreProductRequest $request)
    {
        $DTO = ProductDTO::fromRequest($request);
        $product = $this->service->store($DTO);
        return response()->json($product, 201);
    }

    public function show(Product $product)
    {
        return response()->json($product, 200);
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        $DTO = ProductDTO::fromRequest($request);
        $product = $this->service->update($product, $DTO);
        return response()->json($product, 200);
    }

    public function destroy(Product $product)
    {
        $this->service->delete($product);

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
