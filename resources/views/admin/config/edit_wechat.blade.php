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
                            微信配置
                        </h2>

                    </div>

                </div> <!-- / .row -->
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">


                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{route('admin.config.update',['name'=>$name])}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">token</label>
                                <input type="text" name="WECHAT_TOKEN" value="{{$config['data']['WECHAT_TOKEN']??''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">appid</label>
                                <input type="text" name="WECHAT_APPID" value="{{$config['data']['WECHAT_APPID']??''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">appsecret</label>
                                <input type="text" name="WECHAT_APPSECRET" value="{{$config['data']['WECHAT_APPSECRET']??''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-primary">保存</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

@endpush