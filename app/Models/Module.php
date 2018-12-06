<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
//    不允许什么字段进入
    protected $guarded =[];
//    字段数据转化为数组类型
    protected $casts =[
        'permissions'=>'array'
    ];
}
