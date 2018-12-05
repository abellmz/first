<?php
namespace App\Services;
use App\Models\Keyword;
use App\Models\Rule;
use Houdunwang\WeChat\WeChat;

class WechatService{
    public function __construct()
    {
        //与微信通信绑定
        //读取 config/hd_config.php配置文件
        //config()读取框架配置项,框架配置项读取 env 对应数据,env 数据来源我们自己后台
        $config =config('hd_wechat');//config函数是框架
        WeChat::config($config);
        WeChat::valid();
//        dd('1');
    }
//          参数为0能视作没参数？  在控制器中 编辑和添加上（没参数）用到
    public function ruleView($rule_id=0){
        //根据规则 id 去规则表找旧数据
        $rule =Rule::find($rule_id);
//dd($rule);
        $ruleData=[
            'name'=>$rule?$rule['name']:'',
            'keywords'=>$rule?$rule->keyword()->select('key')->get()->toArray():[],
            //不为0没参数，为0,：该值为空   添加没参数用不到
        ];
//        dd(compact('ruleData'));//编辑时传出 rule的name和keyword的关键词
        return view('wechat.layouts.rule',compact('ruleData'));
    }

    public function ruleStore($type){
//        类request的另一种用法
//        dd($type);
        $post =request()->all();
//        dd($post);二维   json(json应该是字符串吧？？)
//        json数据转换成 数组  没有true 就成为对象了，什么意思?
        $rule =json_decode($post['rule'],true);
//执行规则表的添加  make(待验证数据，所用的验证规则，验证不成功抛出的错误信息)
        \Validator::make($rule,[
            'name'=>'required'
        ],[
            'name.required'=>'规则名称不能为空'
        ])->validate();
//        添加rule表
        $ruleModel=Rule::create(['name'=>$rule['name'],'type'=>$type]);
//        dd($ruleModel);
//        添加keyword表
        foreach($rule['keywords'] as $value){
            Keyword::create([
                'rule_id'=>$ruleModel['id'],
                'key'=>$value['key']
            ]);
        }
        return $ruleModel;
    }
    public function ruleUpdate($rule_id){
//        找到该条数据
        $rule =Rule::find($rule_id);
//dd($rule);一条数据
        $post = request()->all();
//        dd($post);//所有请求
        $ruleData = json_decode($post['rule'],true);
//        dd($ruleData);//name 和keyword
//        rule表中的name更新
        $rule->update(['name'=>$ruleData['name']]);
//        rule表该数据 关联到 keyword表  删除数据    因为一对多关系  keyword有多条
            $rule->keyword()->delete();
//            循环输出keyword数据到表
            foreach ($ruleData['keywords'] as $value){
                Keyword::create([
                    'rule_id'=>$rule_id,
                    'key'=>$value['key']
                ]);
            }
    }
}