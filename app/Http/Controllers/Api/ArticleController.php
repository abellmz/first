<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Transformers\ArticleTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends CommonController
{
    public function articles()
    {
//        return Article::all();
//        return $this->response->array(Article::find(1));
//        return response()->json(['error'=>'Unauthorized'],401);
//        return $this->response->error('This is an error.',404);

        $limit =\request()->query('limit',5);
//        cid在哪用到？
        $cid =\request()->query('cid');
        if ($cid){
            $articles=Article::latest()->where('category_id',$cid)->paginate($limit);
        }else{
            $articles =Article::latest()->paginate($limit);
        }
        return $this->response->paginator($articles,new ArticleTransformer());
//        return $this->response->paginator($articles,new ArticleTransformer());
        //返回所有文章数据,并且每个文章数据中加塞一个栏目
//    return $this->response->array(Article::with('category')->get());
        //dingo中的Transformers装换器                        转换器 即返回的东西进行设置
//        一个 transformer 是一个类，它会获取原始数据并将返回⼀一个格式化之后的标准数组。
    return $this->response->collection(Article::all(),new ArticleTransformer() );
    }

    //获取制定一篇文章
    public function show($id)
    {
//        dd($id);
        return $this->response->item(Article::find($id),new ArticleTransformer());
    }
}
