<?php
//助手函数  判断是否存在hd_config 不存在则建一个  这个函数用于判断有无缓存，最后返回缓存值
if (!function_exists('hd_config')){
//帮助读取后台配置项数据
    function hd_config($var){
        static $cache = [];
 //		字符串转数组          分隔符   字符串
        $info =explode('.',$var);
//  判断是否存在缓存 不存在运行
        if(!$cache){
            //清空所有缓存
            Cache::flush();
            //获取缓存中config_cache数据,如果数据不存在,那么会以第二个参数作为默认值
            $cache = Cache::get('config_cache',function (){
//                第一个作为键值，第二个作为键名  pluck（拉拽摘）
//      感觉：检索的是data和name两个，而不是其中一个，两个一体
                return \App\Models\Config::pluck('data','name');
            });
        }
        //isset($cache[$info[0]][$info[1]])?$cache[$info[0]][$info[1]]:''
        return $cache[$info[0]][$info[1]]??'';
    }
}
//检测当前用户是否有制定角色
function hdHasRole($role){
    if (!auth()->user()->hasRole($role)){
        throw new \App\Exceptions\AuthException('进不了哦');
    }
}
