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
                梦从这里开始
            </p>

            <!-- Form -->
            <form>

                <!-- Email address -->
                <div class="form-group">

                    <!-- Label -->
                    <label>Email Address</label>

                    <!-- Input -->
                    <input type="email" class="form-control" placeholder="name@address.com">

                </div>

                <!-- Password -->
                <div class="form-group">

                    <div class="row">
                        <div class="col">

                            <!-- Label -->
                            <label>Password</label>

                        </div>
                        <div class="col-auto">

                            <!-- Help text -->
                            <a href="password-reset-cover.html" class="form-text small text-muted">
                                Forgot password?
                            </a>

                        </div>
                    </div> <!-- / .row -->

                    <!-- Input group -->
                    <div class="input-group input-group-merge">

                        <!-- Input -->
                        <input type="password" class="form-control form-control-appended" placeholder="Enter your password">

                        <!-- Icon -->
                        <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fe fe-eye"></i>
                  </span>
                        </div>

                    </div>
                </div>

                <!-- Submit -->
                <button class="btn btn-lg btn-block btn-primary mb-3">
                    Sign in
                </button>

                <!-- Link -->
                <p class="text-center">
                    <small class="text-muted text-center">
                        Don't have an account yet? <a href="{{route('register')}}">注册</a>.
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

<!-- JAVASCRIPT
================================================== -->

<!-- Libs JS -->
<script src="{{asset('org/assets')}}/libs/jquery/dist/jquery.min.js"></script>
<script src="{{asset('org/assets')}}/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('org/assets')}}/libs/chart.js/dist/Chart.min.js"></script>
<script src="{{asset('org/assets')}}/libs/chart.js/Chart.extension.min.js"></script>
<script src="{{asset('org/assets')}}/libs/highlight/highlight.pack.min.js"></script>
<script src="{{asset('org/assets')}}/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="{{asset('org/assets')}}/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script src="{{asset('org/assets')}}/libs/list.js/dist/list.min.js"></script>
<script src="{{asset('org/assets')}}/libs/quill/dist/quill.min.js"></script>
<script src="{{asset('org/assets')}}/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="{{asset('org/assets')}}/libs/select2/dist/js/select2.min.js"></script>

<!-- Theme JS -->
<script src="{{asset('org/assets')}}/js/theme.min.js"></script>

</body>
</html>