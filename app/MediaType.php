<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class MediaType extends Model
{
    protected $table = 'media_types';

    protected $fillable = ['name', 'extension', 'status', 'description'];

    use softDeletes;

    protected $dates = ['deleted_at'];
}
