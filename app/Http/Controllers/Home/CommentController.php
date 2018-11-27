<?php

namespace App\Http\Controllers\Home;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
//打开评论模块后 自动加载所有评论数据
    public function index(Request $request,Comment $comment)
    {
//        dd('1');
//        dd($comment->get());
        //get中间可以有链式操作，all不能有链式操作，待确定？
        //这样关联,保证 Comment 模型中有关联 user 的方法
        //获取指定文章的所有评论数据   数据中加塞一条user数据         字段          值(来源于ArticleControll中的show方法参数)
//                                  为啥加上【】
        $comments=$comment->with(['user'])->where('article_id',$request->article_id)->get();
//        dd($comments);
        foreach ($comments as $comment){
//            dd($comment->zan);
            $comment->zan_num=$comment->zan->count();
        }
//code、message用户判断，目前没用上
        return ['code'=>1,'message'=>'','comments'=>$comments];
    }
    //添加评论 存储
    public function store(Request $request,Comment $comment)
    {
//        dd('11');
        $comment->user_id=auth()->id();
        $comment->article_id=$request->article_id;
        $comment->content=$request['content'];
        $comment->save();
//        dd($comment->toArray());
        $comment=$comment->with('user')->find($comment->id);
        $comment->zan_num=$comment->zan->count();
// dd($comment->toArray());
        return ['code'=>1,'message'=>'','comment'=>$comment];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
