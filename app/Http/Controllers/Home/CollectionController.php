<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'only'=>['make']
        ]);
    }
    public function make(Request $request){
//dd($request->all());
        $type = $request->query('type');
        $id=$request->query('id');
//        空间 类
//        dd($id);
        $class='App\Models\\' . ucfirst($type);
//        dd($class);
        $model = $class::find($id);
//        dd($model);
//        dd($model->collection->where('user_id',auth()->id())->first());
        if($collection=$model->collection->where('user_id',auth()->id())->first()){
            //删除            ->collection->where('user_id',auth()->id())
                $collection->delete();
        }else{
            //添加
            $model->collection()->create(['user_id'=>auth()->id()]);
        }
        return back();
    }
}
