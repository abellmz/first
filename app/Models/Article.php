<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use LogsActivity,Searchable;

    protected $fillable=['title','content','id','user_id'];
    //如果需要记录所有$fillable设置的填充属性，可以使用
    protected static $logFillable=true;
    protected static $recordEvents = ['created','updated'];
    //自定义日志名称
    protected static $logName = 'article';
    //模型    关联用户
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
    //评论通知  通知 已读之后跳转链接
    public function getLink($param){
        return route('home.article.show',$this).$param;
//                                    article控制器参数     comment.id
    }
}
