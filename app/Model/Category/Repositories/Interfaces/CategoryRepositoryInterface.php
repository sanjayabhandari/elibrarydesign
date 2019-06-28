<?php

namespace App\Model\Category\Repositories\Interfaces;

use App\Model\Category\Category;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function createCategory( $params, $img);
   public function updateCategory($category_id, array $params,$cat);
    public function deleteCategory($category_id);
    public function get($category_id):Category;
    public function gLevel($a):Collection;
    public function imgUpload($request);
 //   public function update($category_id, array $category_data):Category;
    // public function all();
}
