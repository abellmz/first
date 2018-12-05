@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">

        <!-- Header -->
        <div class="header mt-md-2">
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Title -->
                        <h2 class="header-title">
                            轮播图管理
                        </h2>

                    </div>

                </div> <!-- / .row -->
                <div class="row align-items-center">
                    <div class="col">

                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="{{route('admin.category.index')}}" class="nav-link active">
                                    轮播图列表
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.flash.create')}}" class="nav-link ">
                                    添加轮播图
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">

                        <!-- Buttons -->
                        <a href="{{route('admin.flash.create')}}" class="btn btn-white btn-sm">
                            添加轮播图
                        </a>

                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="table-responsive mb-0" data-toggle="lists"
                 data-lists-values="[&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]">
                <table class="table table-sm table-nowrap card-table">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>轮播图标题</th>
                        <th>图片</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($flashs as $flash)
                        <tr>
                            <td>{{$flash['id']}}</td>
                            <td>{{$flash['title']}}</td>
                            <td>
                                <img width="60" src="{{$flash['path']}}" alt="">
                            </td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function del(obj) {
            require(['hdjs', 'bootstrap'], function (hdjs) {
                hdjs.confirm('确定删除吗?', function () {
                    $(obj).next('form').submit();
                })
            })
        }
    </script>
@endpush