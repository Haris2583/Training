<?php

namespace App\Repositories\Interfaces;


interface IProductRepository
{
    public function getAllProducts();
    public function getProductById($id);
    public function createProduct(array $data);
    public function deleteProduct($id);
}
