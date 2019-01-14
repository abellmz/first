@extends('home.layouts.master')
@section('content')
@push('css-lunbo')
    <link rel="stylesheet" href="{{asset('flash')}}">
@endpush

    <section class="slides-sticky wrapper wow bounceInUp animated" style="visibility: visible; animation-name: bounceInUp;">
        <!-- 幻灯片 start-->
        <section class="slide-main slide-home">
            <div class="swiper-container swiper-home swiper-container-horizontal swiper-container-fade">
                <div class="swiper-wrapper" style="transition-duration: 300ms;">
                    @foreach($flashs as  $flash)
                    <article class="swiper-slide slide-single swiper-slide-duplicate swiper-slide-next" data-swiper-slide-index="0" style="width: 800px; transform: translate3d(0px, 0px, 0px); opacity: 1; transition-duration: 300ms;">
                        <a href="" target="_blank" rel="nofollow" class="swiper-image" style="background-image: url({{$flash['path']}});">
                            <div class="swiper-post">
                                <h3>php类库扩展神器之composer</h3>
                                <p class="description">
                                    composer是 PHP 用来管理依赖（dependency）关系的工具。你可以在自己的项目中声明所依赖的外部工具库（libraries），Composer 会帮你安装这些依赖的库文件。那么composer是什么东东，在我们开发的时候，它能帮我们解决何需求...
                                </p>
                            </div>
                        </a>
                    </article>
                    @endforeach
                </div>

                <!-- 右上角小点 -->
                <div class="swiper-pagination swiper-home-pagination swiper-pagination-clickable swiper-pagination-bullets">
                    <span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
                </div>
                <!-- 左右按钮 -->
                <div class="swiper-button swiper-home-button-next swiper-button-next fa fa-angle-right"></div>
                <div class="swiper-button swiper-home-button-prev swiper-button-prev fa fa-angle-left"></div>
            </div>

        </section>
        <!--置顶推荐  动态-->
        <section class="sticky box triangle">
            <a class="more" title="置顶推荐的文章">
                <span>置顶推荐</span>
            </a>
            <ul>
                <li>
                    <article class="postlist">
                        <figure>
                            <a href="" title="">
                                <img class="thumb" width="80px" src="{{asset('org/static-1')}}/images/1.jpeg" alt="">
                            </a>
                        </figure>
                        <h3>
                            <a href="" title="">解决laravel框架运行时报错:Please provide a valid cache path</a>
                        </h3>
                        <div class="homeinfo">
                            <span class="category">
                            <a href="" >PHP</a>
                        </span>
                            <span class="date">2017-08-29</span>
                            <!--点赞-->
                            <span class="like">
                            <i class="fa fa-thumbs-o-up"></i>
                            <span class="count">100</span>
                        </span>
                        </div>
                    </article>
                </li>
                <li>
                    <article class="postlist">
                        <figure>
                            <a href="" title="">
                                <img class="thumb" src="{{asset('org/static-1')}}/images/1.jpeg" alt="">
                            </a>
                        </figure>
                        <h3>
                            <a href="" title="">解决laravel框架运行时报错:Please provide a valid cache path</a>
                        </h3>
                        <div class="homeinfo">
                            <span class="category">
                            <a href="" >PHP</a>
                        </span>
                            <span class="date">2017-08-29</span>
                            <!--点赞-->
                            <span class="like">
                            <i class="fa fa-thumbs-o-up"></i>
                            <span class="count">100</span>
                        </span>
                        </div>
                    </article>
                </li>
                <li>
                    <article class="postlist">
                        <figure>
                            <a href="" title="">
                                <img class="thumb" src="{{asset('org/static-1')}}/images/1.jpeg" alt="">
                            </a>
                        </figure>
                        <h3>
                            <a href="" title="">解决laravel框架运行时报错:Please provide a valid cache path</a>
                        </h3>
                        <div class="homeinfo">
                            <span class="category">
                            <a href="" >PHP</a>
                        </span>
                            <span class="date">2017-08-29</span>
                            <!--点赞-->
                            <span class="like">
                            <i class="fa fa-thumbs-o-up"></i>
                            <span class="count">100</span>
                        </span>
                        </div>
                    </article>
                </li>
                <li>
                    <article class="postlist">
                        <figure>
                            <a href="" title="">
                                <img class="thumb" src="{{asset('org/static-1')}}/images/1.jpeg" alt="">
                            </a>
                        </figure>
                        <h3>
                            <a href="" title="">解决laravel框架运行时报错:Please provide a valid cache path</a>
                        </h3>
                        <div class="homeinfo">
                            <span class="category">
                            <a href="" >PHP</a>
                        </span>
                            <span class="date">2017-08-29</span>
                            <!--点赞-->
                            <span class="like">
                            <i class="fa fa-thumbs-o-up"></i>
                            <span class="count">100</span>
                        </span>
                        </div>
                    </article>
                </li>
            </ul>

        </section>
        <!--置顶推荐-->
    </section>
    <section class="like wrapper box triangle wow bounceInUp animated" style="visibility: visible; animation-name: bounceInUp;">
        <section class="home_title"><h3 class="left">热门浏览</h3></section>
        <section class="post_list post_bottom">
            <ul class="layout_ul">
                <li class="layout_li">
                    <article class="postgrid">
                        <figure>
                            <a href="" title="解决laravel框架运行时报错:Please provide a valid cache ">
                                <img class="thumb" src="{{asset('org/static-1')}}/images/1.jpeg" alt="解决laravel框架运行时报错:Please provide a valid cache ">
                            </a>
                        </figure>
                        <h2>
                            <a href="" title="解决laravel框架运行时报错:Please provide a valid cache ">解决laravel框架运行时报错:Please provide a valid cache </a>
                        </h2>
                        <div class="homeinfo">
                            <span class="category"><a href="" rel="category tag">PHP</a></span>
                            <span class="date">2017-07-25</span>
                            <span  class="like">
                                <i class="fa fa-thumbs-o-up"></i>
                                <span class="count">10</span>
                            </span>
                        </div>
                    </article>
                </li>
                <li class="layout_li">
                    <article class="postgrid">
                        <figure>
                            <a href="" title="解决laravel框架运行时报错:Please provide a valid cache ">
                                <img class="thumb" src="{{asset('org/static-1')}}/images/1.jpeg" alt="解决laravel框架运行时报错:Please provide a valid cache ">
                            </a>
                        </figure>
                        <h2>
                            <a href="" title="解决laravel框架运行时报错:Please provide a valid cache ">解决laravel框架运行时报错:Please provide a valid cache </a>
                        </h2>
                        <div class="homeinfo">
                            <span class="category"><a href="" rel="category tag">PHP</a></span>
                            <span class="date">2017-07-25</span>
                            <span  class="like">
                                <i class="fa fa-thumbs-o-up"></i>
                                <span class="count">10</span>
                            </span>
                        </div>
                    </article>
                </li>
                <li class="layout_li">
                    <article class="postgrid">
                        <figure>
                            <a href="" title="解决laravel框架运行时报错:Please provide a valid cache ">
                                <img class="thumb" src="{{asset('org/static-1')}}/images/1.jpeg" alt="解决laravel框架运行时报错:Please provide a valid cache ">
                            </a>
                        </figure>
                        <h2>
                            <a href="" title="解决laravel框架运行时报错:Please provide a valid cache ">解决laravel框架运行时报错:Please provide a valid cache </a>
                        </h2>
                        <div class="homeinfo">
                            <span class="category"><a href="" rel="category tag">PHP</a></span>
                            <span class="date">2017-07-25</span>
                            <span  class="like">
                                <i class="fa fa-thumbs-o-up"></i>
                                <span class="count">10</span>
                            </span>
                        </div>
                    </article>
                </li>
                <li class="layout_li">
                    <article class="postgrid">
                        <figure>
                            <a href="" title="解决laravel框架运行时报错:Please provide a valid cache ">
                                <img class="thumb" src="{{asset('org/static-1')}}/images/1.jpeg" alt="解决laravel框架运行时报错:Please provide a valid cache ">
                            </a>
                        </figure>
                        <h2>
                            <a href="" title="解决laravel框架运行时报错:Please provide a valid cache ">解决laravel框架运行时报错:Please provide a valid cache </a>
                        </h2>
                        <div class="homeinfo">
                            <span class="category"><a href="" rel="category tag">PHP</a></span>
                            <span class="date">2017-07-25</span>
                            <span  class="like">
                                <i class="fa fa-thumbs-o-up"></i>
                                <span class="count">10</span>
                            </span>
                        </div>
                    </article>
                </li>
            </ul>
        </section>
    </section>


    <section class="cat wrapper">
        <section class="cat-wrap left">
            <section class="box triangle wow bounceInUp animated" style="visibility: visible; animation-name: bounceInUp;">
                <section class="home_title"><h3 class="left">php</h3></section>
                <section class="cat3_list2">
                    <ul class="layout_ul">
                        <li class="layout_li">
                            <a href="" title="解决laravel框架运行时报错:Please provide a valid cache ">解决laravel框架运行时报错:Please provide a valid cache </a>
                        </li>
                        <li class="layout_li">
                            <a href="" title="you are running composer with SSL/TLS protected disabled">解决laravel框架运行时报错:Please provide a valid cache </a>
                        </li>
                        <li class="layout_li">
                            <a href="" title="thinkphp5系列之模型验证">thinkphp5系列之模型验证</a>
                        </li>
                        <li class="layout_li">
                            <a href="" title="thinkphp5博客项目实战视频">thinkphp5博客项目实战视频</a>
                        </li>
                    </ul>
                </section>
            </section>
            <section class="box triangle wow bounceInUp animated" style="visibility: visible; animation-name: bounceInUp;">
                <section class="home_title"><h3 class="left">web前端</h3></section>
                <section class="cat3_list2">
                    <ul class="layout_ul">
                        <li class="layout_li">
                            <a href="" title="YARN, 一款更优秀的javascript包管理(快速、可靠、安全的依赖管理)">YARN, 一款更优秀的javascript包管理(快速、可靠、安全的依赖管理)</a>
                        </li>
                        <li class="layout_li">
                            <a href="" title="windows10安装nodejs出现：The error code is 2503.">windows10安装nodejs出现：The error code is 2503.</a>
                        </li>
                        <li class="layout_li">
                            <a href="" title="jquery之Ajax--处理跨域请求">jquery之Ajax--处理跨域请求</a>
                        </li>
                    </ul>
                </section>
            </section>
        </section>
        <aside class="sidebar right">
            <section class="cat1_sidebar">
                <article class="sidebar_widget box widget_salong_posts wow bounceInUp triangle animated"
                         style="visibility: visible; animation-name: bounceInUp;">
                    <div class="sidebar_title">
                        <h3>热门文章</h3>
                    </div>
                    <ul>
                        <li>
                            <article class="postlist">
                                <figure>
                                    <a href="" title="">
                                        <img class="thumb" src="{{asset('org/static-1')}}/images/1.jpeg" alt="解决laravel框架运行时报错:Please provide a valid cache">
                                    </a>
                                </figure>
                                <h3>
                                    <a href="" title="解决laravel框架运行时报错:Please provide a valid cache">解决laravel框架运行时报错:Please provide a valid cache</a>
                                </h3>
                                <div class="homeinfo">
                                    <span class="category">
                                        <a href="" >LINUX</a>
                                    </span>
                                    <span class="date">2017-08-29</span>
                                    <span class="favoriteup">
                                        <span class="wpfp-span"><i class="fa fa-eye"></i>1</span>
                                    </span>
                                </div>
                            </article>
                        </li>
                        <li>
                            <article class="postlist">
                                <figure>
                                    <a href="" title="">
                                        <img class="thumb" src="{{asset('org/static-1')}}/images/1.jpeg" alt="解决laravel框架运行时报错:Please provide a valid cache">
                                    </a>
                                </figure>
                                <h3>
                                    <a href="" title="解决laravel框架运行时报错:Please provide a valid cache">解决laravel框架运行时报错:Please provide a valid cache</a>
                                </h3>
                                <div class="homeinfo">
                                    <span class="category">
                                        <a href="" >LINUX</a>
                                    </span>
                                    <span class="date">2017-08-29</span>
                                    <span class="favoriteup">
                                        <span class="wpfp-span"><i class="fa fa-eye"></i>1</span>
                                    </span>
                                </div>
                            </article>
                        </li>
                        <li>
                            <article class="postlist">
                                <figure>
                                    <a href="" title="">
                                        <img class="thumb" src="{{asset('org/static-1')}}/images/1.jpeg" alt="解决laravel框架运行时报错:Please provide a valid cache">
                                    </a>
                                </figure>
                                <h3>
                                    <a href="" title="解决laravel框架运行时报错:Please provide a valid cache">解决laravel框架运行时报错:Please provide a valid cache</a>
                                </h3>
                                <div class="homeinfo">
                                    <span class="category">
                                        <a href="" >LINUX</a>
                                    </span>
                                    <span class="date">2017-08-29</span>
                                    <span class="favoriteup">
                                        <span class="wpfp-span"><i class="fa fa-eye"></i>1</span>
                                    </span>
                                </div>
                            </article>
                        </li>
                        <li>
                            <article class="postlist">
                                <figure>
                                    <a href="" title="">
                                        <img class="thumb" src="{{asset('org/static-1')}}/images/1.jpeg" alt="解决laravel框架运行时报错:Please provide a valid cache">
                                    </a>
                                </figure>
                                <h3>
                                    <a href="" title="解决laravel框架运行时报错:Please provide a valid cache">解决laravel框架运行时报错:Please provide a valid cache</a>
                                </h3>
                                <div class="homeinfo">
                                    <span class="category">
                                        <a href="" >LINUX</a>
                                    </span>
                                    <span class="date">2017-08-29</span>
                                    <span class="favoriteup">
                                        <span class="wpfp-span"><i class="fa fa-eye"></i>1</span>
                                    </span>
                                </div>
                            </article>
                        </li>
                    </ul>
                </article>
                <aside class="sidebar right">
                    <section class="cat4_sidebar">
                        <article id="linkcat-2" class="sidebar_widget box   bounceInUp triangle">
                            <div class="sidebar_title">
                                <h3>友情链接</h3>
                            </div>
                            <ul>
                                <li >
                                    <a href="http://www.wubin.pro" title="" target="_blank">武斌博客</a>
                                </li>
                                <li>
                                    <a href="http://www.wubin.pro" title="" target="_blank">武斌博客</a>
                                </li>
                            </ul>
                        </article>
                    </section>
                </aside>
            </section>

        </aside>            <!--边栏end-->
        <div class="sf1"></div>
    </section>






@endsection
@push('lunbo')
    <script type="text/javascript" src="{{asset('org/static-1')}}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('org/static-1')}}/js/push.min.js"></script>
    <script type="text/javascript" src="{{asset('org/static-1')}}/js/swiper.jquery.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            spaceBetween: 30,
            effect: 'fade',
            autoplay: 3000,
        });
    </script>
@endpush
