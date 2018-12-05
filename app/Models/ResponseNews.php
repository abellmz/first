<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponseNews extends Model
{
    //允许填充的字段
    protected $fillable = ['data','rule_id'];
//    关联规则表  多对一
    public function rule(){
        return $this->belongsTo(Rule::class);
    }
}
