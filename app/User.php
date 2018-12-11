<?php

namespace App;

use App\Models\Attachment;
use App\Models\Collection;
use App\Models\Zan;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array  允许存入数据库的字段
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verified_at', 'icon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array  隐藏谁？（这是属性，用于调用）
     */
//    打印的时候隐藏
    protected $hidden = [
        'password', 'remember_token',
    ];

//    重写 据库通知中 获取所有通知的 notifications 方法   读取之间  升序  创建时间  降序
    public function notifications()
    {
        return $this->morphMany(DatabaseNotification::class, 'notifiable')->orderBy('read_at', 'asc')->orderBy('created_at', 'desc');
    }

    public function getIconAttribute($key)
    {//默认icon
        return $key ?: asset('org/img/user.jpg');
    }

    //关联 附件（方法名叫附加）  返回一个类model下的Attachment
    public function attachment()
    {
        return $this->hasMany(Attachment::class);
    }

//    用户对用户
    public function fans()
    {
        //在中间表中  通过用户id(user_id)找多个用户id('following_id)
        //  用户      属于      多用户                         中间表                 用户-id                      多用户-id
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'following_id');

    }

    public function following()
    {
        //  用户      属于      多用户                         中间表                 主角                              粉丝
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'user_id');
    }

    public function zan()
    {
//        一个用户对应多个赞
        return $this->hasMany(Zan::class);
    }

    public function collecttion()
    {
//        一个用户对应多个收藏
        return $this->hasMany(Collection::class);
    }
    /**
     * 获取将存储在JWT主题声明中的标识符.
     * 就是⽤用户表主键 id *
     * @return mixed    需要以下两个方法，不然继承报错
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
