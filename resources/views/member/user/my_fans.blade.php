@extends('home.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @include('member.layouts.menu')
            <div class="col-sm-9">
                <div class="container-fluid">
                    {{--传来的参数  粉丝量（分页）--}}
                    @if($fans->count() == 0)
                        <p class="text-muted text-center p-5">暂无粉丝</p>
                    @else
                        <div class="row">
                            @foreach($fans as $fan)
                                <div class="col-12 col-md-6 col-xl-4">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <a href="{{route('member.user.show',$fan)}}" class="avatar avatar-xl card-avatar ">
                                                <img src="{{$fan->icon}}" class="avatar-img rounded-circle border border-white" alt="...">
                                            </a>

                                            <h2 class="card-title">
                                                <a href="{{route('member.user.show',$fan)}}">{{$fan->name}}</a>
                                            </h2>

                                            <p class="card-text">
                                          <span class="badge badge-soft-secondary">
                                            粉丝:{{$fan->fans->count()}}
                                          </span>
                                                <span class="badge badge-soft-secondary">
                                            关注:{{$fan->following->count()}}
                                          </span>
                                            </p>

                                            @auth()
                                                <hr>
                                                <div class="col-auto">
                                                    <a href="{{route('member.attention',$fan)}}" class="btn btn-block btn-sm btn-white">
                                                        @if($fan->fans->contains(auth()->user()))
                                                            取消关注
                                                        @else
                                                            关注
                                                        @endif

                                                    </a>
                                                </div>
                                            @endauth
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        {{$fans->links()}}
                    @endif
                </div>

            </div>

        </div>
    </div>
@endsection
@push('js')
    {{--hdjs里面上传需要再控制台--network中检测数据--}}
    {{--处理上传之前需要创建处理上传控制器方法、配置对应的路由--}}
    {{--需要修改hdjs上传配置项：hdjs.blade.php--}}
    {{--还需要注意上传419状态码--}}
    <script>
        require(['hdjs', 'bootstrap']);

        //上传图片
        function upImagePc() {
            require(['hdjs'], function (hdjs) {
                var options = {
                    multiple: false,//是否允许多图上传
                    //data是向后台服务器提交的POST数据
                    data: {name: '后盾人', year: 2099},
                };
                hdjs.image(function (images) {
                    //alert(1);
                    //将返回的图片路径写入到input表单的val值
                    //提交表单做头像修改
                    $("[name='icon']").val(images[0]);
                    //将上传返回的图片写入avatar-img元素的src
                    $(".avatar-img").attr('src', images[0]);
                    //触发表单提交
                    $('#editIocn').submit();
                }, options)
            });
        }
    </script>
@endpush