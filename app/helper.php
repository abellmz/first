<?php
//助手函数  判断是否存在hd_config 不存在则建一个
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
                return \App\Models\Config::pluck('data','name');
            });
        }
        //isset($cache[$info[0]][$info[1]])?$cache[$info[0]][$info[1]]:''
        return $cache[$info[0]][$info[1]]??'';
    }
}