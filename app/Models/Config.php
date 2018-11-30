<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable=['name','data'];
//    $casts属性   字段=>希望转换的类型    比如json或array
    protected $casts=['data'=>'array',];
}
