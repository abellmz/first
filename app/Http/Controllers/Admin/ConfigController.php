<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    //加载模板页面
    public function edit($name){
//        dd($name);
//                   数据库中寻找列/值，若未找到就插入一条数据 列/值
        $config=Config::firstOrNew(
            ['name'=>$name]
        );

        return view('admin.config.edit_' . $name,compact('name','config'));
    }
//数据添加更新
    public function update($name,Request $request){

//        数据库中寻找列/值，若未找到就插入一条数据 列/值
        $res=Config::updateOrCreate(
            ['name'=>$name],//查询条件
            ['name'=>$name,'data'=>$request->all()]
//            //更新或者添加的数据,持久化模型，因此无需调用：save()
        );
//        dd($request);
//        laravel扩展包的函数，本函数用于修改.env配置文件，更新的配置项必须在.env文件中存在。
        hd_edit_env($request->all());
//        dd($request);
        return back()->with('success','配置项更新成功');
    }
}
