<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Comment extends Model
{
    use LogsActivity;
    protected $fillable=['content','article_id'];
//如果需要记录所有$fillable设置的填充属性，可以使用
	protected static $logFillable = true;
	protected static $recordEvents = ['created','updated'];
//	//自定义日志名称
	protected static $logName = 'comment';
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
