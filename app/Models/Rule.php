<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable = ['name','type'];
//    关联 关键词表
    public function keyword(){
//        一对多
        return $this->hasMany(Keyword::class);
    }
//    文本回复  一对多
    public function responseText(){
        return $this->hasMany(ResponseText::class);
    }
//    图文回复 一对多
    public function responseNews(){
        return $this->hasMany(ResponseNews::class);
    }

}
