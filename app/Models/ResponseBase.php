<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponseBase extends Model
{
    protected $fillable=['id'];
//    属性类型装换    访问data时 data将被转化成数组
    protected $casts =['data'=>'array'];
}
