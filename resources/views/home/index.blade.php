@extends('home.layouts.master')
@section('content')
@push('css-lunbo')
    <link rel="stylesheet" href="{{asset('flash')}}">
@endpush
<style>
    body{
        font-family:'Microsoft Yahei';
        background-color:#eeeeee;
    }
    .slide-wp{
        width:1900px;
        height:460px;
        position:relative;
        left:50%;
        margin-left:-950px;
    }
    .slides, .slide-bg{
        height:460px;
        background-color:#fff;
        overflow-x:hidden;
    }
    .slidesjs-pagination{
        position:absolute;
        top:420px;
        left:50%;
        z-index:11;
        margin-left:-52px;
    }
    .slidesjs-pagination li{
        float:left;
        margin-right:10px;
    }
    .slidesjs-pagination li a{
        text-indent:-9999px;
        background-color:#333;
        display:inline-block;
        *display:block;
        _display:block;
        width:25px;
        height:7px;
    }
    .slidesjs-pagination li a.active{
        background-color:#666;
    }
    .slideChild{
        width:945px;
        margin:0 auto;
        z-index:10;
        height:460px;
        position:relative;
    }
    .slideChild a.opa{
        position:absolute;
        top:0;
        left:0;
        display:inline-block;
        *display:block;
        _display:block;
        width:100px;
        height:50px;
        background-color:#fff;
        filter:alpha(opacity=0);
        -ms-filter:"alpha(opacity=0)";
        opacity:0;
    }
    .slideChild a.a-jd{
        top:320px;
        left:135px;
        width:230px;
        height:55px;
    }
    .slideChild a.a-video{
        top:50px;
        left:40px;
        width:230px;
        height:285px;
    }
    .slideChild a.a-ad{
        position:absolute;
        background-color:#202020;
        color:#fff;
        text-align:center;
        top:365px;
        left:404px;
        width:130px;
        height:32px;
        line-height:32px;
        font-size:16px;
    }
    .slideChild span.timeTip{
        color:#fbd504;
        font-size:56px;
        position:absolute;
        top:165px;
        left:170px;
        font-weight:bold;
    }
    .slideImg{
        position:absolute;
        top:0;
        left:0;
        z-index:9;
    }


</style>
<div class="row">
    {{--轮播图--}}
    <div class="col-8">
        <div class="slide-bg ">
            <div class="slide-wp">
                <div id="slides" class="slides">
                    @foreach($flashs as $flash)
                    <div>
                        <div class="slideChild" style="display:none;">
                            <span class="timeTip">7月18日 11:00准时开启</span>
                            <a class="a-ad js-aAd" href="">预订查询</a>
                        </div>
                        <img class="slideImg" src="{{$flash['path']}}" galleryimg="no">
                    </div>
                   @endforeach

                </div><!--end slides-->
            </div><!--end slide-wp-->
        </div><!--end slide-bg-->
    </div>
    {{--动态--}}
    <div class="col-4">
        <div class="uptop"><a href="#"></a></div><!--end top-->
        <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <!-- Files -->
                <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                    动态
                                </h4>

                            </div>
                        </div> <!-- / .row -->
                    </div>

                    <div class="card-body">
                        <!-- List group -->
                        <div class="list-group list-group-flush my--3">
                            @foreach($actives as $active)
                                @if($active['log_name'] =='article')
                                    @include('home.layouts._article')
                                @elseif($active['log_name'] =='comment')
                                    @include('home.layouts._comment')
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- List -->
                </div>
                {{$actives->links()}}
            </div>

        </div>
    </div>
    </div>
</div>
@endsection
@push('lunbo')
    <script src="{{asset('js/js-lunbo')}}/181.js"></script>
    <script src="{{asset('js/js-lunbo')}}/jquery.slides.min.js"></script>
    <script>
        $(function() {
            $('#slides').slidesjs({
                play:{
                    active: false,
                    effect: "fade",
                    auto: true,
                    interval: 4000
                },
                effect: {
                    fade: {
                        speed: 1500,
                        crossfade: true
                    }
                },
                pagination: {
                    active: true
                },
                navigation:{
                    active: false
                }
            });
        });

    </script>
@endpush