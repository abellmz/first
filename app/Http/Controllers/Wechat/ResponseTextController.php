<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Keyword;
use App\Models\ResponseText;
use App\Models\Rule;
use App\Services\WechatService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\VarDumper\Cloner\Data;

class ResponseTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        读取所有回复
            $field =ResponseText::all();
//            dd($field);
        return view('wechat.response_text.index',compact('field'));
    }

    public function create(WechatService $wechatService)
    {
//        dd('1');//ruleView在edit的Vue中也用着（edit多了参数）
//                  该方法返回 加载rule页面
        $ruleView = $wechatService->ruleView();
        return view('wechat.response_text.create',compact('ruleView'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,WechatService $wechatService)
    {
//        开启事务  用于解决一个表数据录入成功  其他关联表失败的情况
        DB::beginTransaction();
        $rule=$wechatService->ruleStore('text');
//        添加  回复表
        ResponseText::create([
            'content'=>$request['data'],
            'rule_id'=>$rule['id'],
        ]);
//        提交事务
        DB::commit();
        return redirect()->route('wechat.response_text.index')->with('success','操作成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResponseText  $responseText
     * @return \Illuminate\Http\Response
     */
    public function show(ResponseText $responseText)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResponseText  $responseText
     * @return \Illuminate\Http\Response
     */
    public function edit(ResponseText $responseText,WechatService $wechatService)
    {
//        得到所有rule表的数据
        $ruleView =$wechatService->ruleView($responseText['rule_id']);
//                                                                  rule表的数据        回复表
        return view('wechat.response_text.edit',compact('ruleView','responseText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResponseText  $responseText
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResponseText $responseText,WechatService $wechatService)
    {
//        开启事物  解决一个表数据录入成功  其他关联表失败的情况
        DB::beginTransaction();
        $wechatService->ruleUpdate($responseText['rule_id']);
//更新回复内容   表中content就是模板中data（包含多条回复） 不用循环
        $responseText->update([
            'content'=>$request['data'],
            'rule_id'=>$responseText['rule_id'],
        ]);
//        提交事物
        DB::commit();
        return redirect()->route('wechat.response_text.index')->with('success','操作成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResponseText  $responseText
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResponseText $responseText)
    {
//        dd($responseText);
        $responseText->rule()->delete();
        return redirect()->route('wechat.response_text.index')->with('success','操作成功');
    }
}
