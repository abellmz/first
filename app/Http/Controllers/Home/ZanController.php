<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
           'only'=>['make']
        ]);
    }
    public function make(Request $request){
//dd($request->all())；//接收type和id参数 为什么用query来调用来着？？query可以只从查询字符串中获取
        $type=$request->query('type');
        $id=$request->query('id');
//        dd($type);
        $class='App\Models\\' . ucfirst($type);
//        dd($class);
        $model=$class::find($id);
//        dd($model);
//        dd($model->zan->where('user_id',auth()->id())->first());
// Article为例：Article类多态关联zan  取出其中user_id为用户的id 取第一条数据（二维数组）                                     字段          用户id
        if ($zan=$model->zan->where('user_id',auth()->id())->first()){
//            删除
            $zan->delete();
        }else{
//            添加
            $model->zan()->create(['user_id'=>auth()->id()]);
        }
//        判断是否为ajax
        if($request->ajax()){
//            dd('11');
            $newModel=$class::find($id);
            return ['code'=>1,'message'=>'','zan_num'=>$newModel->zan->count()];
        }
        return back();
    }

}
