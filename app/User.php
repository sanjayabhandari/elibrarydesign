<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Category\Category;
use App\Model\Product\Product;
use App\Model\Slider\Slider;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Category()
    {
       return $this->hasMany(Category::class);
    }
    public function Author()
    {
       return $this->hasMany(Author::class);
    }

    public function Publisher()
    {
       return $this->hasMany(Publisher::class);
    }
    public function Product()
    {
       return $this->hasMany(Product::class);
    }
    public function Productfile()
    {
       return $this->hasMany(Productfile::class);
    }
    public function Blog()
    {
       return $this->hasMany(Blog::class);
    }
    public function Slider()
    {
       return $this->hasMany(Slider::class);
    }
}
