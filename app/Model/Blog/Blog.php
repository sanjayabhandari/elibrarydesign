<?php

namespace App\Model\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = ['blog_title', 'date', 'short_title', 'status', 'blog_description', 'blog_date', 'created_by', 'image', 'meta_tag', 'meta_title', 'meta_description'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function user()
    {
        return $this->belongsTo(\App\Model\User\User::class, 'created_by');
    }
}
