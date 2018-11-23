<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/assets')}}/libs/flatpickr/dist/flatpickr.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('org/assets')}}/css/theme.min.css">

    <title>Abel空间</title>
</head>

<body class="d-flex align-items-center bg-white border-top-2 border-primary">

<!-- CONTENT
================================================== -->
<div class="container-fluid">
    <div class="row align-items-center justify-content-center">
        <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5">

            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
                登录
            </h1>

            <!-- Subheading -->
            <p class="text-muted text-center mb-5">
                梦从这里启程
            </p>
            <!-- Form -->
            <form method="post" action="{{route('login',['from'=>Request::query('from')])}}">
            @csrf
                <!-- Email address -->
                <div class="form-group">

                    <!-- Label -->
                    <label>邮箱</label>

                    <!-- Input -->
                    <input type="email" name="email" value="" class="form-control" placeholder="请输入邮箱">

                </div>

                <!-- Password -->
                <div class="form-group">

                    <div class="row">
                        <div class="col">

                            <!-- Label -->
                            <label>密码</label>

                        </div>
                        <div class="col-auto">
                            <!-- Help text -->
                            <a href="password-reset-cover.html"  class="form-text small text-muted">
                                忘密码了?
                            </a>

                        </div>
                    </div> <!-- / .row -->
                    <!-- 密码 -->
                    <div class="input-group input-group-merge">
                        <input type="password"name="password" class="form-control form-control-appended" placeholder="请输入密码">
                        <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="fe fe-eye"></i>
                              </span>
                        </div>

                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" value="1">
                    <label class="form-check-label" for="remember">记住我</label>
                </div>

                <!-- Submit -->
                <button class="btn btn-lg btn-block btn-primary mb-3">
                   登录
                </button>

                <!-- Link -->
                <p class="text-center">
                    <small class="text-muted text-center">
                        还没账号? <a href="{{route('register')}}">去注册</a>.
                        <a href="{{route('password_reset')}}">重置密码</a>.
                        <a href="{{route('home')}}">返回首页</a>.
                    </small>
                </p>

            </form>

        </div>
        <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">

            <!-- Image -->
            <div class="bg-cover vh-100 mt--1 mr--3" style="background-image: url({{asset('org/assets')}}/img/covers/auth-side-cover.jpg);"></div>

        </div>
    </div> <!-- / .row -->
</div>
@include('layouts.hdjs')
@include('layouts.message')
</body>
</html>