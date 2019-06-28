<?php

namespace App\Model\Blog\Repositories;

use App\Model\Blog\Repositories\Interfaces\BlogRepositoryInterface;
use App\Model\Blog\Blog;
use Jsdecena\Baserepo\BaseRepository;
use Illuminate\Support\Facades\Auth;

class BlogRepository extends BaseRepository  implements BlogRepositoryInterface
{
    protected $model;

    public function __construct(Blog $blog)
    {

        parent::__construct($blog);
        $this->model = $blog;
    }

    public function  createBlog($data, $img)
    {
        $data['image'] = $img;
        $data['created_by'] = Auth::user()->id;

        return $this->create($data);
    }
    public function updateBlog($blog_id, array $data, $aut)
    {
        $data['image'] = $aut;
        // $data['created_by'] = 1;
        Blog::find($blog_id)->update($data);
    }


    public function get($blog_id): Blog
    {
        return Blog::find($blog_id);
    }
    // public function all()
    // {
    //     return Category::all();
    // }

    public function deleteblog($blog_id)
    {
        Blog::destroy($blog_id);
    }
}
