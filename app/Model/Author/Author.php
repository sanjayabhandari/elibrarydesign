<?php

namespace App\Model\Author;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    protected $table = 'authors';

    protected $fillable = [
        'author_name',
        'dob',
        'address',
        'dod',
        'status',
        'image',
        'author_title',
        'socialprofile',
        'created_by',
        'created_by',
        'description'
    ];
    use SoftDeletes;

    protected $dates=['deleted_at'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
