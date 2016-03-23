<?php
/**
 * Created by PhpStorm.
 * User: machine
 * Date: 23/03/16
 * Time: 10:00
 */

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrators extends Authenticatable
{
    protected $table = "administrators";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname', 'firstname', 'description','photo', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
