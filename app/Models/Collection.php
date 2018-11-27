<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = ['user_id'];
    public function  user(){
//collection user
        return $this->belongsTo(User::class);
    }
////获取多态关联模型 Article 、视屏（虽然还没做出来）等
    public function belongsModel(){
return $this->morphTo('collection');
    }
    
}
