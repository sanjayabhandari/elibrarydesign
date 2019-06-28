<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'title', 'description', 'author_id', 'publisher_id', 'category_id',  'media_id',
        'language_id',   'created_by',   'pop',   'py',   'keywords',   'translator',   'illustrator', 'editor',
        'link', 'meta_title', 'meta_description', 'status', 'revised_date', 'revised_edition', 'image'
    ];


    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function user()
    {
        return $this->belongsTo(\App\Model\User\User::class, 'created_by');
    }
    public function category()
    {
        return $this->belongsTo(\App\Model\Category\Category::class, 'category_id');
    }
    public function publisher()
    {
        return $this->belongsTo(\App\Model\Publisher\Publisher::class);
    }
    public function language()
    {
        return $this->belongsTo(\App\Model\Language\Language::class);
    }
    public function media()
    {
        return $this->belongsTo(\App\MediaType::class);
    }
    public function author()
    {
        return $this->belongsTo(\App\Model\Author\Author::class, 'author_id');
    }

    public function pdffile()
    {
        return $this->hasOne(\App\Model\Productfile\Productfile::class, 'product_id')->where('extension', 'pdf')->orderBy('created_at', 'desc');
    }

    public function review()
    {
        return $this->hasMany(\App\Review::class, 'product_id');
    }
    public function activereviews()
    {
        return $this->hasMany(\App\Review::class, 'product_id')->where('status', 1);
    }
}
