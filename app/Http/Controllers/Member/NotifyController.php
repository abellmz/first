<?php

namespace App\Http\Controllers\Member;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\DatabaseNotification;

class NotifyController extends Controller
{
    public function __construct()
    {
//        用户能访问index方法
        $this->middleware('auth',[
            'only'=>['index']
        ]);
    }
    //展示所有通知
    public function index(User $user){
//        dd('11');
        $this->authorize('isMine',$user);
        //列出所有通知
        $notifications=$user->notifications()->paginate(10);
        return view('member.notify.index',compact('user','notifications'));
    }
    public function show(DatabaseNotification $notify){
        $notify->markAsRead();
//        dd($notify);
        //跳转到文章详情页,页面自动滚动到对应的评论  需要自己探索
//        link 在CommentNotifify 中定义了
        return redirect($notify['data']['link']);
    }
}
