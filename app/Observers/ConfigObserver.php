<?php

namespace App\Observers;

use App\Models\Config;

class ConfigObserver
{
    public function created(){
        $this->saveConfigToCache();
    }
    public function updated(){
//        dd('1');
        $this->saveConfigToCache();
    }
    private function saveConfigToCache(){
//        dd(Config::pluck('data','name'));
//     存在服务的文件          键         值    检索     值     键（固定的设置）
        \Cache::forever('config_cache',Config::pluck('data','name'));
    }
}
