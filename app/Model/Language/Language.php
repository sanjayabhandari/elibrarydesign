<?php

namespace App\Model\Language;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    protected $table = 'languages';

    protected $fillable = ['name', 'nationality', 'status'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
