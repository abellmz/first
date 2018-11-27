<?php

namespace App;

use App\Models\Attachment;
use App\Models\Collection;
use App\Models\Zan;
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
        'name', 'email', 'password','email_verified_at','icon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array  隐藏谁？（这是属性，用于调用）
     */
//    隐藏谁呀？？？打印的时候隐藏
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getIconAttribute($key){//默认icon
        return $key?:asset('org/img/user.jpg');
    }
    //关联 附件（方法名叫附加）  返回一个类model下的Attachment
    public function attachment(){
        return $this->hasMany(Attachment::class);
    }
//    用户对用户
    public function fans(){
        //在中间表中  通过用户id(user_id)找多个用户id('following_id)
        //  用户      属于      多用户                         中间表                 用户-id                      多用户-id
        return $this->belongsToMany(User::class,'followers','user_id','following_id');

    }
    public function following(){
        //  用户      属于      多用户                         中间表                 主角                              粉丝
        return $this->belongsToMany(User::class,'followers','following_id','user_id');
    }
    public function zan(){
//        一个用户对应多个赞
        return $this->hasMany(Zan::class);
    }
    public  function collecttion(){
//        一个用户对应多个收藏
        return $this->hasMany(Collection::class);
    }
}
