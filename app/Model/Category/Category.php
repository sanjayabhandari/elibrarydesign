<?php

namespace App\Model\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['cat_name', 'level', 'status', 'child', 'parent', 'created_by', 'image', 'meta_tag', 'meta_title', 'meta_description', 'description'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(\App\Model\Product\Product::class, 'category_id');
    }

    public function activeproducts()
    {
        return $this->hasMany(\App\Model\Product\Product::class, 'category_id')->where('status', 1);
    }
}
