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
    <!-- Theme CSS   引入字体库-->
    <link rel="stylesheet" href="{{asset('org/assets')}}/css/theme.min.css">
    {{--引入css位置--}}
@stack('css')
@stack('css-lunbo')
    <title>{{hd_config('base.title')}}后台</title>
</head>
<body>

<!-- SIDEBAR
================================================== -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset('org/img/user.jpg')}}" class="navbar-brand-img
          mx-auto" alt="...">
        </a>

        <!-- User (xs) -->
        <div class="navbar-user d-md-none">

            <!-- Dropdown -->
            <div class="dropdown">

                <!-- Toggle -->
                <a href="{{route('home')}}" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <img src="{{asset('org/images/front-logo.png')}}" class="avatar-img rounded-circle" alt="...">
                    </div>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                    <a href="{{route('logout')}}" class="dropdown-item">注销登录</a>
                </div>

            </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fe fe-search"></span>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('admin.index')}}">
                        <i class="fe fe-home"></i> Abel
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarPages" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="fe fe-file"></i> 文章系统
                    </a>
                    <div class="collapse show" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.category.index')}}" class="nav-link" >
                                    栏目管理
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.flash.index')}}" class="nav-link" >
                                    轮播图管理
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
{{--网站配置--}}
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#sidebarLayouts" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="fe fe-layout"></i> 网站配置
                    </a>
                    <div class="collapse " id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.config.edit',['name'=>'base'])}}" class="nav-link">
                                    基本配置
                                </a>
                                <a href="{{route('admin.config.edit',['name'=>'upload'])}}" class="nav-link">
                                    上传配置
                                </a>
                                <a href="{{route('admin.config.edit',['name'=>'mail'])}}" class="nav-link">
                                    邮件配置
                                </a>
                                <a href="{{route('admin.config.edit',['name'=>'code'])}}" class="nav-link">
                                    验证码配置
                                </a>
                                <a href="{{route('admin.config.edit',['name'=>'search'])}}" class="nav-link">
                                    搜索配置
                                </a>
                                <a href="{{route('admin.config.edit',['name'=>'wechat'])}}" class="nav-link">
                                    微信配置
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
{{--微信管理--}}
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarWechat" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="fe fe-message-square"></i> 微信管理
                    </a>
                    <div class="collapse " id="sidebarWechat">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('wechat.response_base.create')}}" class="nav-link" >
                                    基本回复
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{route('wechat.button.index')}}" class="nav-link" >
                                    微信菜单
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{route('wechat.response_text.index')}}" class="nav-link" >
                                    文本回复
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{route('wechat.response_news.index')}}" class="nav-link" >
                                    图文回复
                                </a>

                            </li>
                        </ul>
                    </div>
                </li>
{{--权限管理--}}
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarAuth" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="fe fe-user"></i> 权限管理
                    </a>
                    <div class="collapse show" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link" >
                                    用户管理
                                </a>
                                <a href="{{route('role.role.index')}}" class="nav-link" >
                                    角色管理
                                </a>
                                <a href="{{route('role.permission.index')}}" class="nav-link" >
                                    权限列表
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="nav-item d-md-none">
                    <a class="nav-link" href="#sidebarModalActivity" data-toggle="modal">
                        <span class="fe fe-bell"></span> Notifications
                    </a>
                </li>
            </ul>

            <!-- Divider -->
            <hr class="my-3">

            <!-- Heading -->
            <h6 class="navbar-heading text-muted">
                Documentation
            </h6>

            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link " href="getting-started.html">
                        <i class="fe fe-clipboard"></i> Getting started
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#sidebarComponents" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarComponents">
                        <i class="fe fe-book-open"></i> Components
                    </a>
                    <div class="collapse " id="sidebarComponents">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="components.html#alerts" class="nav-link">
                                    Alerts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#avatars" class="nav-link">
                                    Avatars
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#badges" class="nav-link">
                                    Badges
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#breadcrumb" class="nav-link">
                                    Breadcrumb
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#buttons" class="nav-link">
                                    Buttons
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#button-group" class="nav-link">
                                    Button group
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#cards" class="nav-link">
                                    Cards
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#charts" class="nav-link">
                                    Charts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#dropdowns" class="nav-link">
                                    Dropdowns
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#forms" class="nav-link">
                                    Forms
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#icons" class="nav-link">
                                    Icons
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#lists" class="nav-link">
                                    Lists
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#loaders" class="nav-link">
                                    Loaders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#modal" class="nav-link">
                                    Modal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#navs" class="nav-link">
                                    Navs
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#navbar" class="nav-link">
                                    Navbar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#page-headers" class="nav-link">
                                    Page headers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#pagination" class="nav-link">
                                    Pagination
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#popovers" class="nav-link">
                                    Popovers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#progress" class="nav-link">
                                    Progress
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#social-posts" class="nav-link">
                                    Social post
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#tables" class="nav-link">
                                    Tables
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#tooltips" class="nav-link">
                                    Tooltips
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#typography" class="nav-link">
                                    Typography
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#utilities" class="nav-link">
                                    Utilities
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <i class="fe fe-git-branch"></i> 系统版本 <span class="badge badge-primary ml-auto">v1.1.2</span>
                    </a>
                </li>
            </ul>
            <!-- User (md) -->
            <div class="navbar-user mt-auto d-none d-md-flex">


                <!-- Dropup -->
                <div class="dropup">
                    <!-- Toggle -->
                    <a href="#!" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-sm avatar-online">
                            <img src="{{auth()->user()->icon}}" class="avatar-img rounded-circle" alt="...">
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                        <a href="{{route('logout')}}" class="dropdown-item">注销登录</a>
                    </div>
                </div>



            </div>


        </div> <!-- / .navbar-collapse -->

    </div> <!-- / .container-fluid -->
</nav>

<!-- MAIN CONTENT
================================================== -->
<div class="main-content">
    @yield('content')
</div> <!-- / .main-content -->
<!-- JAVASCRIPT
================================================== -->
@include('layouts.hdjs')
@include('layouts.message')
<script>
    require(['bootstrap'])
</script>
{{--stack在手册Blade模板--}}
@stack('js')
@stack('lunbo')
</body>
</html>