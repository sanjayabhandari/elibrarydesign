<?php

namespace App\Model\Productfile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Product\Product;

class Productfile extends Model
{
    protected $table = 'productfiles';
    protected $fillable = [
        'fileformate',
        'product_id',
        'created_by',
        'status',
        'extension'
    ];

    use SoftDeletes;

    //  public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }

    //  public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
