<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Keyword;
use App\Models\ResponseBase;
use App\Models\Rule;
use App\Services\WechatService;
use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    //微信配置信息   url 填写地址指向该方法
    //调用WechatService ,这个类中构造方法进行通信验证
    public function handler(WechatService $wechatService){
        //消息管理模块
//        file_put_contents('abc.php',11);
        $instance =WeChat::instance('message');

        //        得到用户提交信息
//        file_put_contents('abc.php',$instance->Content);
        $rule=Rule::find(12);
//        dd($rule);
//        file_put_contents('abc.php',$rule->responseText->pluck('content')->toArray()[0]);
        $responseContent = json_decode($rule->responseText->pluck('content')->toArray()[0],true);
        $content = array_random($responseContent)['content'];
//        file_put_contents('abc.php',$content);
//
        //注意点：微信给我们服务器推送消息 post 方式推送消息
        //第一点:注意路由设置请求方法 any
        //第二点:post 请求必须伴随 csrf,需要社会 csrf 白名单
//        第四：别忘了关联和类型
        //所有微信相关用法需要参考:https://www.kancloud.cn/houdunwang/wechat/325049
//----------------------------------------------------------
        //判断是否是关注事件
       if ($instance->isSubscribeEvent()){
            $content = ResponseBase::find(1);      //关注
            return$instance->text($content['data']['subscribe']);
       }
///
    //判断是否是文本消息
        if($instance->isTextMsg()){
            //        得到用户提交的信息
        $content =$instance->Content;
        return $this->keyWordToFindResponse($instance,$content);
        }
        //======菜单事件=======//
        //消息管理模块
        $buttonInstance = WeChat::instance('button');
        if($buttonInstance->isClickEvent()){
            $message=$buttonInstance->getMessage();
            return $this->keyWordToFindResponse($instance,$message->EventKey);
        }
    }

//    根据关键词回复内容                         所有信息    用户内容
        private function keyWordToFindResponse($instance,$content){
//                                  筛选  关键字   用户内容
            if ($keyword = Keyword::where('key',$content)->first()){
//                 关联规则
              $rule =$keyword->rule;
//                file_put_contents('abc.php',$rule);
//                判断是否文本
              if ($rule['type']=='text'){//             关联回复文本
                  $responseContent =json_decode($rule->responseText->pluck('content')->toArray()[0],true);
              $content =array_random($responseContent)['content'];
              return $instance->text($content);
              //判断是否图文
              }elseif ($rule['type']=='news'){
                  $news=json_decode($rule->responseNews->toArray()[0]['data'],true);
              return $instance->news([$news]);
              }
            }
//            当匹配不到关键词的时候 执行默认回复
            $content = ResponseBase::find(1);
            return $instance->text($content['data']['default']);

        }
}
