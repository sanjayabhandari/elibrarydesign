<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = ['user_id', 'product_id', 'status', 'review','rating'];

    use softDeletes;

    protected $dates = ['deleted_at'];
    //


   public function user()
        {
            return $this->belongsTo(\App\User::class, 'user_id');
        }
    
}
