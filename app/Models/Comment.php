<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $casts=[
        'created_at'=>'datetime:Y-m-d',
    ];
    //    关联用户表
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function zan(){
        return $this->morphMany(Zan::class,'zan');
    }
    public function article(){
        return $this->belongsTo(Article::class);
    }
}