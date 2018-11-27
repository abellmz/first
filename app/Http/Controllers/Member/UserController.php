<?php

namespace App\Http\Controllers\Member;

use App\Models\Article;
use App\Models\Collection;
use App\Models\Zan;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //获取当前用户发表的文章               将分页后的数据赋给$articles
        $articles=Article::latest()->where('user_id',$user->id)->paginate(4);
        return view('member.user.show',compact('user','articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    //User指文章所属用户  由于策略中当前用户==文章所属用户 才能有编辑选项  所以这也就代表的是当前用户
    public function edit(User $user,Request $request)
    {
        $this->authorize('isMine',$user);//isMine策略 -> 来自User模型
        $type=$request->query('type');//这的query可能会选错了  两个好像是一个？？？
        return view('member.user.edit_'.$type,compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data= $request->all();
        //        dd($data);//等等http://laravel.edu/attachment/CsHdpdcyZltsgEoWQQG8JGL0zZH2xilzPnvNgjYm.jpeg"
        //调用策略isMine
        $this->authorize('isMine',$user);
        //验证
        $this->validate($request,[
        'password'=>'sometimes|required|min:3|confirmed',
            'name'=>'sometimes|required',
        ],[
            'password.required'=>'请输入密码',
            'password.min'=>'密码不得小于3位',
            'password.confirmed'=>'两次密码不一致',
            'name.required'=>'请输入昵称'
        ]);
        if ($request->password){
            $data['password']=bcrypt($data['password']);
        }
        $user->update($data);
        return back()->with('success','操作成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
// 传来的是文章作者  User类中的fans方法（关联找出粉丝  返回是个数组?是对象）
    //调用内置方法toggle判断数组中有没有用户，User表中移出或者添加
    public function attention(User $user){
//      文章作者   的粉丝     切换(移出或者添加)
        $user->fans()->toggle(auth()->user());
        return back();
    }
    //我的粉丝
    public function myFans(User $user){
        //获取$user用户的粉丝
//        dd('11');
        $fans=$user->fans()->paginate(2);
        return view('member.user.my_fans',compact('user','fans'));
    }
    //我关注的人
    public function myFollowing(User $user){
        //获取$user用户关注的人
    $followings=$user->following()->paginate(10);
    return view('member.user.my_following',compact('user','followings'));
    }
//    我的点赞
    public function myZan(User $user,Request $request,Zan $zan){
        $type=$request->query('type');
//        dd($type);
//        dd($user->zan()->where('zan_type','App\Models\\'.ucfirst($type))->paginate(1));
//        用户关联赞  找出zan_type=。。的了数据  分页
        $zansData=$user->zan()->where('zan_type','App\Models\\'.ucfirst($type))->paginate(1);
//            dd($zansData);
        return view('member.user.my_zan_' . $type,compact('user','zansData'));
    }
    public function myCollection(User $user,Request $request,Collection $collection){
        $type=$request->query('type');
//        dd($type);
//        dd($user->collecttion()->where('collection_type','App\Models\\'.ucfirst($type))->paginate(1));
        $collectionData=$user->collecttion()->where('collection_type','App\Models\\'.ucfirst($type))->paginate(1);
        return view('member.user.my_collection_' . $type,compact('user','collectionData'));
    }
}
