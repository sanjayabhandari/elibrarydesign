<?php

namespace App\Model\Blog\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Model\Blog\Blog;

interface BlogRepositoryInterface extends  BaseRepositoryInterface
{
    public function createBlog($params,$img);
    public function updateBlog($blog_id,array $params,$aut);
    public function deleteBlog($blog_id);
    public function get($blog_id):Blog;
}
