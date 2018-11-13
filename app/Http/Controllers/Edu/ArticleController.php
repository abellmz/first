<?php

namespace App\Http\Controllers\Edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(){
        $data="走，带你潇洒去！";
        $res=[1,2,3];
        return view('edu.article.index',compact('data','res'));
    }
    public function aa(){
        return view('edu.article.aa');
    }
    public function store(Request $request){
        dd($request->all());
    }
}
