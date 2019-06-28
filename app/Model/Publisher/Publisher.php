<?php

namespace App\Model\Publisher;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
   protected $table = 'publishers';

   protected $fillable = ['pub_name','address','description','status','created_by','contact'];

   use SoftDeletes;

   protected $dates = ['deleted_at'];
   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
