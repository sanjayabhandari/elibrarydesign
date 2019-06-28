<?php

namespace App\Model\Product\Repositories\Interfaces;


use App\Model\Product\Product;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;



interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function createProduct($params, $image);
    public function updateProduct($product_id, array $params, $image);
    public function deleteProduct($product_id);
    public function get($product_id): Product;
}
