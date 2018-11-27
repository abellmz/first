<?php

namespace App\Providers;

use App\Models\Comment;
use App\Observers\CommentObserver;
use App\Observers\UserObserver;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //解决mysql版本低问题
        Schema::defaultStringLength(191);
        //carbon  中文时间
//        Carbon::setLocale('zh');
//        注册观察者
        User::observe(UserObserver::class);
//        对comment类进行监听  监听者（观察者）
        Comment::observe(CommentObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
