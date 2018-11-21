<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function __construct()
    {//未登陆用户
        $this->middleware('auth',[
            'only'=>['create','store','edit','update','destroy'],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //    $articles=Article::find(5);
//    $data=Article::find(5);
//    dd($data);
//        dd($articles);
//        $articles=Article::latest()->get();
        //接收category路由的参数为category
//    $articles=Article::latest()->paginate(4);//分页
//        dd($articles->toArray());

        $category=$request->query('category');
        $articles=Article::latest();
        if ($category){
            $articles=$articles->where('category_id',$category);
//            dd($articles);
        }
        $articles=$articles->paginate(4);
        $categories=Category::all();
    return view('home.article.index',compact('articles','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('home.article.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request,Article $article)
    {
//        dd($request);
        $article->title=$request->title;
        $article->category_id=$request->category_id;
        $article->content= $request['content'];
        $article->user_id=auth()->id();
        $article->save();
        return redirect()->route('home.article.index')->with('success','文章发布成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('home.article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {           //授权        授权动作      模型
        $this->authorize('update',$article);
                    //栏目  所有数据
        $categories=Category::all();
//                                            传递参数
        return view('home.article.edit',compact('categories','article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->authorize('update',$article);
        $article->title=$request->title;
        $article->category_id=$request->category_id;
        $article->content=$request['content'];
        $article->save();
        return redirect()->route('home.article.index')->with('success','文章编辑成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete',$article);
        $article->delete();
        return redirect()->route('home.article.index')->with('success','文章删除成功');
    }
}
