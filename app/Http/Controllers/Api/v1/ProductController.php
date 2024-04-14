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
        return $this->sendResponse(
            message: "products list",
            result: $this->service->all()
        );
    }


    public function store(StoreProductRequest $request)
    {
        $DTO = ProductDTO::fromRequest($request);
        $product = $this->service->store($DTO);
        return $this->sendResponse(
            message: "product created successfully",
            result: $product,
            code: 200
        );
    }

    public function show(Product $product)
    {
        return $this->sendResponse(
            message: "product retrieved successfully",
            result: $this->service->show($product),
            code: 200
        );
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        $DTO = ProductDTO::fromRequest($request);
        $product = $this->service->update($product, $DTO);
        return $this->sendResponse(
            message: "product updated successfully",
            code: 200
        );
    }

    public function destroy(Product $product)
    {
        $this->service->delete($product);

        return $this->sendResponse(message: "product deleted", result: true, code: 204);
    }
}
