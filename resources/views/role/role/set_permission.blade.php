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
                            给 <span class="text-muted">{{$role->title}}</span> 设置权限
                        </h2>
                    </div>

                </div> <!-- / .row -->
            </div>
        </div>

        <form action="{{route('role.role.set_role_permission',$role)}}" method="post">
            @csrf
            <div class="card">

                <div class="card-body">
                    {{--循环模块表中的  每个模块--}}
                    @foreach($modules as $module)
                        <div class="card">
                            <div class="card-header">
                                {{--模块中文名--}}
                                {{$module['title']}}
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    {{--循环每个模块 的每个权限--}}
                                    @foreach($module['permissions'] as $permission)
                                        <div class="col-4">
                                            <input type="checkbox"
                                                   name="permissions[]"
                                                   {{--模块英文名+每一个权限英文名--}}
                                                   value="{{$module['name'] . '-' . $permission['name']}}"
                                                   {{--角色是否有    这个权限                                                则选种--}}
                                                   @if($role->hasPermissionTo($module['name'] . '-' . $permission['name'])) checked @endif
                                            @if('Admin-admin-index' == $module['name'] . '-' . $permission['name'])
                                                checked
                                                @endif
                                            >
                                            <strong>{{$permission['title']}}</strong>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <button class="btn btn-primary">保存数据</button>
        </form>
    </div>

@endsection
