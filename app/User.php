<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array  允许存入数据库的字段
     */
    protected $fillable = [
        'name', 'email', 'password','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array  隐藏谁？（这是属性，用于调用）
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getIconAttribute($key){
        return $key?:asset('org/img/user.jpg');
    }
}
