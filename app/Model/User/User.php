<?php

namespace App\Model\User;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
// use Watson\Validating\ValidatingTrait;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',  'email', 'password', 'email_verified_at', 'remeber_token'
    ];

    /**
     * The attributes that should be appended.
     *
     * @var array
     */
    //protected $appends = ['name'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Validation Rule
     *
     * @var array
     */
    // protected $rules = [
    //     'first_name'   => 'required',
    //     'last_name'   => 'required',
    //     'email'    => 'required|email|unique:users,email',
    //     'password' => 'required',
    //     'user_type' => 'required|numeric',
    // ];


    // /**
    //  * Set the User first Name.
    //  *
    //  * @param  string  $value
    //  * @return string
    //  */
    // public function setFirstNameAttribute($value)
    // {
    //     $this->attributes['first_name'] = trim($value);
    // }

    // /**
    //  * Set the User Last Name.
    //  *
    //  * @param  string  $value
    //  * @return string
    //  */
    // public function setLastNameAttribute($value)
    // {
    //     $this->attributes['last_name'] = ucfirst(trim($value));
    // }

    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = Hash::make($value);
    // }

    // /**
    //  * Set the User Email.
    //  *
    //  * @param  string  $value
    //  * @return string
    //  */
    // public function setEmailAttribute($value)
    // {
    //     $this->attributes['email'] = ucfirst(trim($value));
    // }

    // /**
    //  * Set the User type.
    //  *
    //  * @param  string  $value
    //  * @return string
    //  */
    // public function setUserTypeAttribute($value)
    // {
    //     $this->attributes['user_type'] = trim($value);
    // }

    // public function getFullNameAttribute()
    // {
    //     return ucfirst($this->attributes['first_name']) . ' ' . ucfirst($this->attributes['last_name']);
    // }

    // public function dealer()
    // {
    //     return $this->belongsToMany('App\Dealer\Dealer');
    // }

    // public function dealergroup()
    // {
    //     //        return $this->belongsToMany('App\DealerGroup','dealer_group_user');
    // }
}
