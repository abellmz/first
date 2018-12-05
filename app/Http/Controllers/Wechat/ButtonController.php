<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Button;
use App\Services\WechatService;
use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ButtonController extends Controller
{
public  function __construct()
{
    $this->middleware('admin.auth',[
        'except'=>[],//除了。。。不用登录外
    ]);
}

    public function index()
    {
//        dd('11');
        $buttons = Button::latest()->paginate(10);
        return view('wechat.button.index',compact('buttons'));
    }
//添加
    public function create()
    {
        return view('wechat.button.create');
    }
//存储
    public function store(Request $request)
    {
//        dd($request->all());
        Button::create($request->all());
        return redirect()->route('wechat.button.index')->with('success','菜单添加成功');
    }

    public function show(Button $button)
    {
        //
    }
//    编辑
    public function edit(Button $button)
    {
//        dd('1');
        return view('wechat.button.edit',compact('button'));
    }
//更新
    public function update(Request $request, Button $button)
    {
//        dd($request->all());
        $button->update($request->all());
        return redirect()->route('wechat.button.index')->with('success','菜单编辑成功');
    }
//菜单
    public function destroy(Button $button)
    {
//        dd('2');
        $button->delete();
        return redirect()->route('wechat.button.index')->with('success','菜单删除成功');
    }
//    推送微信
    public function push(Button $button,WechatService $wechatService){
//        dd('11');//将原来数据库 json 格式数据转为数组
        $menu = json_decode($button['data'],true);
        //wechat 类要求传递的参数为数组
        $res = WeChat::instance('button')->create($menu);
//        dd($res);
        if ($res['errcode']==0){
            $button->update(['status'=>1]);
            Button::where('id','!=',$button->id)->update(['status'=>0]);
            return back()->with('success','菜单推送成功');
        }else{
            return back()->with('danger',$res['errmsg']);
        }
    }
}
