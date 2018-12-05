<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/assets')}}/libs/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('org/assets')}}/css/theme.min.css">
    @stack('css')
    <title>{{hd_config('base.title')}}</title>
</head>
<body>
<!-- TOPNAV
================================================== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <!-- Toggler -->
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand mr-auto" href="index.html">
            <img src="{{asset('org/img/user.jpg')}}" alt="..." class="navbar-brand-img">
        </a>

        <!-- Form -->
        <form class="form-inline mr-4 d-none d-lg-flex" action="{{route('home.search')}}">
            <div class="input-group input-group-rounded input-group-merge" data-toggle="lists"
                 data-lists-values='["name"]'>
                <!-- Input -->
                <input type="search" name="wd" class="form-control form-control-prepended  dropdown-toggle search"
                       data-toggle="dropdown" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fe fe-search"></i>
                    </div>
                </div>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-card">
                    <div class="card-body">

                        <!-- List group -->
                        <div class="list-group list-group-flush list my--3">
                            <a href="team-overview.html" class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar">
                                            <img src="{{asset('org/assets')}}/img/avatars/teams/team-logo-1.jpg"
                                                 alt="..." class="avatar-img rounded">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="text-body mb-1 name">
                                            Airbnb
                                        </h4>

                                        <!-- Time -->
                                        <p class="small text-muted mb-0">
                                            <span class="fe fe-clock"></span>
                                            <time datetime="2018-05-24">Updated 2hr ago</time>
                                        </p>

                                    </div>
                                </div> <!-- / .row -->
                            </a>
                            <a href="team-overview.html" class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar">
                                            <img src="{{asset('org/assets')}}/img/avatars/teams/team-logo-2.jpg"
                                                 alt="..." class="avatar-img rounded">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="text-body mb-1 name">
                                            Medium Corporation
                                        </h4>

                                        <!-- Time -->
                                        <p class="small text-muted mb-0">
                                            <span class="fe fe-clock"></span>
                                            <time datetime="2018-05-24">Updated 2hr ago</time>
                                        </p>

                                    </div>
                                </div> <!-- / .row -->
                            </a>
                            <a href="project-overview.html" class="list-group-item px-0">

                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar avatar-4by3">
                                            <img src="{{asset('org/assets')}}/img/avatars/projects/project-1.jpg"
                                                 alt="..." class="avatar-img rounded">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="text-body mb-1 name">
                                            Homepage Redesign
                                        </h4>

                                        <!-- Time -->
                                        <p class="small text-muted mb-0">
                                            <span class="fe fe-clock"></span>
                                            <time datetime="2018-05-24">Updated 4hr ago</time>
                                        </p>

                                    </div>
                                </div> <!-- / .row -->

                            </a>
                            <a href="project-overview.html" class="list-group-item px-0">

                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar avatar-4by3">
                                            <img src="{{asset('org/assets')}}/img/avatars/projects/project-2.jpg"
                                                 alt="..." class="avatar-img rounded">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="text-body mb-1 name">
                                            Travels & Time
                                        </h4>

                                        <!-- Time -->
                                        <p class="small text-muted mb-0">
                                            <span class="fe fe-clock"></span>
                                            <time datetime="2018-05-24">Updated 4hr ago</time>
                                        </p>

                                    </div>
                                </div> <!-- / .row -->

                            </a>
                            <a href="project-overview.html" class="list-group-item px-0">

                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar avatar-4by3">
                                            <img src="{{asset('org/assets')}}/img/avatars/projects/project-3.jpg"
                                                 alt="..." class="avatar-img rounded">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="text-body mb-1 name">
                                            Safari Exploration
                                        </h4>

                                        <!-- Time -->
                                        <p class="small text-muted mb-0">
                                            <span class="fe fe-clock"></span>
                                            <time datetime="2018-05-24">Updated 4hr ago</time>
                                        </p>

                                    </div>
                                </div> <!-- / .row -->

                            </a>
                            <a href="profile-posts.html" class="list-group-item px-0">

                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar">
                                            <img src="{{asset('org/assets')}}/img/avatars/profiles/avatar-1.jpg"
                                                 alt="..." class="avatar-img rounded-circle">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="text-body mb-1 name">
                                            Dianna Smiley
                                        </h4>

                                        <!-- Status -->
                                        <p class="text-body small mb-0">
                                            <span class="text-success">●</span> Online
                                        </p>

                                    </div>
                                </div> <!-- / .row -->

                            </a>
                            <a href="profile-posts.html" class="list-group-item px-0">

                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar">
                                            <img src="{{asset('org/assets')}}/img/avatars/profiles/avatar-2.jpg"
                                                 alt="..." class="avatar-img rounded-circle">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Title -->
                                        <h4 class="text-body mb-1 name">
                                            Ab Hadley
                                        </h4>

                                        <!-- Status -->
                                        <p class="text-body small mb-0">
                                            <span class="text-danger">●</span> Offline
                                        </p>

                                    </div>
                                </div> <!-- / .row -->

                            </a>
                        </div>

                    </div>
                </div> <!-- / .dropdown-menu -->

            </div>
        </form>
        <!-- User -->
        <div class="navbar-user">
            {{--通知--}}
            @auth()
            <!-- Dropdown  里面内容还没看 -->
            <div class="dropdown mr-4 d-none d-lg-flex">
                <!-- Toggle -->
                <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{--判断  用户未读文件数不为0 则亮--}}
                    <span class="icon @if(auth()->user()->unreadNotifications()->count()!=0) active @endif">
                <i class="fe fe-bell"></i>
              </span>
                </a>
                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h5 class="card-header-title">
                                    通知
                                </h5>

                            </div>
                            <div class="col-auto">
                                <!-- Link -->
                                <a href="{{route('member.notify',auth()->user())}}" class="small">
                                    查看全部通知
                                </a>

                            </div>
                        </div> <!-- / .row -->
                    </div> <!-- / .card-header -->
                    <div class="card-body">

                        <!-- List group -->
                        <div class="list-group list-group-flush my--3">
                            {{--循环出 未读通知 3条--}}
                            @foreach(auth()->user()->unreadNotifications()->limit(3)->get() as $notification)
                                <a class="list-group-item px-0" href="{{route('member.notify.show',$notification)}}">
                                    <div class="row">
                                        <div class="col-auto">
                                            <!-- Avatar  头像-->
                                            <div class="avatar avatar-sm">
                                                <img src="{{$notification['data']['user_icon']}}" alt="..." class="avatar-img rounded-circle">
                                            </div>
                                        </div>
                                        <div class="col ml--2">
                                            <!-- Content -->
                                            <div class="small text-muted">
                                                {{--名字 文章题目--}}
                                                <strong class="text-body">{{$notification['data']['user_name']}}</strong> 评论了
                                                <strong class="text-body">{{$notification['data']['article_title']}}</strong>
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <small class="text-muted">
                                                {{--发表时间--}}
                                                {{$notification->created_at->diffForHumans()}}
                                            </small>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                            @endforeach
                        </div>

                    </div>
                </div> <!-- / .dropdown-menu -->

            </div>
            @endauth
            {{--文章添加--}}
            <div class="dropdown mr-4 d-none d-lg-flex">
                <!-- Toggle 笔-->
                <a href="{{route('home.article.create')}}" class="text-muted">
                  <span class="icon ">
                    <i class="fe fe-edit-3"></i>
                  </span>
                </a>
            </div>
        {{--文章添加--}}
        <!-- 用户头像 Dropdown -->
            <div class="dropdown">
            @auth()
                <!-- Toggle -->
                    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route('member.user.show',auth()->user())}}"
                           class="dropdown-item">{{auth()->user()->name}}</a>
                        @can('view',auth()->user())
                            {{--为什么auth()->user()不能改成其他参数，授权又不涉及到这个？--}}
                            <a href="{{route('admin.index')}}" class="dropdown-item">后台管理</a>
                        @endcan
                        <hr class="dropdown-divider">
                        <a href="{{route('logout')}}" class="dropdown-item">注销登录</a>
                    </div>
                @else
                    {{--传给Request类一个参数 给定下标为from 值为当前的地址--}}
                    <a href="{{route('login',['from'=>url()->full()])}}" class="btn btn-white btn-sm">登录</a>
                    <a href="{{route('register')}}" class="btn btn-white btn-sm">注册</a>
                @endauth
            </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse mr-auto order-lg-first" id="navbar">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <input type="search" class="form-control form-control-rounded" placeholder="Search" aria-label="Search">
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        首页
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#!" id="topnavPages" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Pages
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="topnavPages">
                        <li>
                            <a class="dropdown-item" href="orders.html">
                                Orders
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('home.article.index')}}">文章列表</a>
                </li>
            </ul>

        </div>

    </div> <!-- / .container -->
</nav>

<!-- MAIN CONTENT
================================================== -->
<div class="main-content">

    @yield('content')

</div> <!-- / .main-content -->
<footer class="container">
    <hr class="my-0">
    <div class="text-center py-6">
        <div>
            <p class="text-muted">我们的使命：传播互联网前沿技术，帮助更多的人实现梦想</p>
            <small class="small text-secondary">
                Copyright © 2010-2018 houdunren.com All Rights Reserved
                京ICP备12048441号-3
            </small>
            <p class="small text-secondary">
                <i class="fa fa-phone-square" aria-hidden="true"></i> : 010-86467608
                <i class="fa fa-telegram ml-2" aria-hidden="true"></i> :
                <a href="mailto:23000711698@qq.com" class="text-secondary">
                    23000711698@qq.com
                </a>
                <br>
            </p>
        </div>
    </div>
</footer>
<!-- JAVASCRIPT
================================================== -->

<!-- Libs JS -->
@include('layouts.hdjs')
<script>
    require(['bootstrap']);
</script>
@include('layouts.message')
<!-- Theme JS -->
@stack('js')
@stack('lunbo')
</body>
</html>