<?php

namespace App\Repositories\Interfaces;


interface IProductRepository
{
    public function getAllProducts();
    public function getProductById($id);
}
