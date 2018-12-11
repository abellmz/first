<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd('这是');
//      不是用户  或者  用户不是管理员    点击登录后台  连接路由 经过handel判断  再到方法  第三道拦截
//        if(!auth()->check() || auth()->user()->is_admin != 1){
//                                             调用策略
        if (!auth()->check()||!auth()->user()->can('Admin-admin-index')){
            //重定向 回到home
            return redirect()->route('home');
        }
        //返回继续
        return $next($request);
    }
}
