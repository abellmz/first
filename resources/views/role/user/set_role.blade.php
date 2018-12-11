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
                            设置角色
                        </h2>

                    </div>

                </div> <!-- / .row -->
            </div>
        </div>


        <form action="{{route('role.user.user_set_role_store',$user)}}" method="post">
            @csrf
            <div class="card">

                <div class="card-body">

                    <div class="row">
                        @foreach($roles as $role)
                            <div class="col-4">
                                <input type="checkbox"
                                       {{--同一类多选 设数组--}}
                                       name="roles[]"
                                       {{--角色英文名--}}
                                value="{{$role['name']}}"
                                       {{--用户有该角色则选择--}}
                                @if($user->hasRole($role['name'])) checked @endif
                                >
                                <strong>{{$role->title}}</strong>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <button class="btn btn-primary">保存</button>
        </form>
    </div>
@endsection
