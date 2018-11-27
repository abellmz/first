<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //模型关联
    public function user(){
        return $this->belongsTo(User::class);//多 对 一  文章对作者
    }
    public function category(){//多 对 一  文章对栏目
        return $this->belongsTo(Category::class);
    }
    public function zan(){
        //文章-赞  多态关联
        return $this->morphMany(Zan::class,'zan');
    }
    public function collection(){
        //文章-收藏 多态关联
        return $this->morphMany(Collection::class,'collection');
    }
}
