<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IProductRepository;

use App\Models\Product;

class ProductRepository implements IProductRepository
{
    public function getAllProducts()
    {
        return Product::with('variants')->get();
    }

    public function getProductById($id)
    {
        return Product::with('variants')->findOrFail($id);
    }
}
