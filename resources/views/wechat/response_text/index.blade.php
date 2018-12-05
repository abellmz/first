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
                            微信文本回复
                        </h2>

                    </div>

                </div> <!-- / .row -->
                <div class="row align-items-center">
                    <div class="col">

                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="{{route('wechat.response_text.index')}}" class="nav-link active">
                                    回复列表
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{route('wechat.response_text.create')}}" class="nav-link ">
                                    添加回复
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">

                        <!-- Buttons -->
                        <a href="{{route('wechat.response_text.create')}}" class="btn btn-white btn-sm">
                            添加回复
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
                        <th>规则名称</th>
                        <th>关键词</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    {{--将ResponseText表中所有数据 全部循环--}}
                    @foreach($field as $v)
                        <tr>
                            <td>{{$v['id']}}</td>
                            {{--关联rule表--}}
                            <td>{{$v->rule->name}}</td>
                            {{--dump($v->rule->keyword->pluck('key')->toArray());--}}
                            <td>
                                {{--转化为字符串   关联rule表 再关联keyword表  第二参数必须为数组--}}
                                {{implode(',',$v->rule->keyword->pluck('key')->toArray())}}
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="First group">

                                    <a href="{{route('wechat.response_text.edit',$v)}}" class="btn btn-white">编辑</a>

                                    <button onclick="del(this)" type="button" class="btn btn-white">删除</button>
                                    <form action="{{route('wechat.response_text.destroy',$v)}}" method="post">
                                        @csrf  @method('DELETE')
                                    </form>
                                </div>
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
            //引入 sweetalert js
            require(['https://cdn.bootcss.com/sweetalert/2.1.2/sweetalert.min.js'], function (swal) {
                swal("确定删除?", {
                    icon: 'warning',
                    buttons: {
                        cancel: "取消",
                        defeat: '确定',
                    },
                }).then((value) => {
                    //开关组键  上一个的值（参数）
                    switch (value) {
                        case "defeat":
                            $(obj).next('form').submit();
                            break;
                        default:
                    }
                });
            })
        }
    </script>
@endpush
