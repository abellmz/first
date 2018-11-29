<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    public  function index(){
        //获取所有动态
        $actives=Activity::latest()->paginate(5);
return view('home.index',compact('actives'));
    }
    public function search(Request $request){
        //接受搜索的关键词  input框的name
        $wd=$request->query('wd');
//        $category = Category::where('title',$wd);
//        dd($wd);
        //如果不考虑分类筛选
        $articles = Article::search($wd)->paginate(1);
        //return view('home.search',compact('articles','categories'));
        return view('home.search',compact('articles'));
    }

}
