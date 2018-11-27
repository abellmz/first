@extends('home.layouts.master')
@section('content')
    {{--展示文章内容  --}}
    <div class="container">
        <div class="row edu-topic-show mt-3">
            <div class="col-12 col-xl-9">
                <div class="card card-body p-5">
                    <div class="row">

                        <div class="col text-right">
                            {{--搜藏判断--}}
                            @auth()
                                @if($article->collection->where('user_id',auth()->id())->first())
                                    <a href="{{route('home.collection.make',['type'=>'article','id'=>$article['id']])}}"
                                       class="btn btn-xs"><i class="fa fa-heart-o" aria-hidden="true"></i>已收藏</a>
                                @else
                                    <a href="{{route('home.collection.make',['type'=>'article','id'=>$article['id']])}}"
                                       class="btn btn-xs"><i class="fa fa-heart-o" aria-hidden="true"></i>收藏</a>
                                @endif
                            @else
                                <a href="{{route('login',['from'=>url()->full()])}}" class="btn btn-xs"><i
                                            class="fa fa-heart-o" aria-hidden="true"></i> 收藏</a>
                            @endauth
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <h2 class="mb-4">
                                {{$article['title']}}
                            </h2>
                            <p class="text-muted mb-1 text-muted small">
                                <a href="{{route('member.user.show',$article->user)}}" class="text-secondary">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                </a><a href="{{route('member.user.show',$article->user)}}"
                                       class="text-secondary">{{$article->user->name}}</a>

                                <i class="fa fa-clock-o ml-2" aria-hidden="true"></i>
                                {{$article->created_at->diffForHumans()}}

                                <a href="{{route('home.article.index',['category'=>$article->category->id])}}"
                                   class="text-secondary">
                                    <i class="fa fa-folder-o ml-2" aria-hidden="true"></i>
                                    {{$article->category->title}}
                                </a>

                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-5">
                            <div class="markdown editormd-html" id="content">
                                <textarea name="content" id="" hidden cols="30"
                                          rows="10"> {{$article->content}}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        {{--判断是否登录--}}
                        @auth()
                            {{--article多态关联zan 条件   即判断用户有没有点过赞--}}
                            @if($article->zan->where('user_id',auth()->id())->first())
                                <a class="btn btn-white"
                                   href="{{route('home.zan.make',['type'=>'article','id'=>$article['id']])}}">👍 取消赞</a>
                            @else
                                <a class="btn btn-white"
                                   href="{{route('home.zan.make',['type'=>'article','id'=>$article['id']])}}">👍 点赞</a>
                            @endif
                        @else
                            <a class="btn btn-white" href="{{route('login',['from'=>url()->full()])}}">👍 点赞</a>
                        @endauth
                    </div>
                    <div class="row">
                        <div class="col-12 mr--3">
                            <div class="avatar-group d-none d-sm-flex">
                                {{--循环  关联zan中的数据   zan_id在这个地方用上--}}
                                @foreach($article->zan as $zan)
                                    {{--取前缀，一一对应上--}}
                                    <a href="{{route('member.user.show',$zan->user)}}" class="avatar avatar-xs"
                                       data-toggle="tooltip" title="" data-original-title="Ab Hadley">
                                        {{--关联上了User,取icon--}}
                                        <img src="{{$zan->user->icon}}" alt="..."
                                             class="avatar-img rounded-circle border border-white">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                {{--评论引入--}}
                @include('home.layouts.comment')
            </div>
            {{--关注 栏--}}
            <div class="col-12 col-xl-3">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <a href="" class="text-secondary">
                                {{$article->user->name}}
                            </a>
                        </div>
                    </div>
                    <div class="card-block text-center p-5">
                        <div class="avatar avatar-xl">
                            <a href="{{route('member.user.show',$article->user)}}">
                                <img src="{{$article->user->icon}}" alt="..." class="avatar-img rounded-circle">
                            </a>
                        </div>
                    </div>
                    @auth()
                        @can('isNotMine',$article->user)
                            <div class="card-footer text-muted">
                                {{--文章作者--}}
                                <a class="btn btn-white btn-block btn-xs"
                                   href="{{route('member.attention',$article->user)}}">
                                    {{--文章   作者   的粉丝  包含（登录用户）    文章表关联user类中的fansfan方法--}}
                                    @if($article->user->fans->contains(auth()->user()))
                                        取消关注
                                    @else
                                        <i class="fa fa-plus" aria-hidden="true">关注 TA</i>
                                    @endif
                                </a>
                            </div>
                        @endcan
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        {{--引入第三方 Markdown使普通文本内容具有一定的格式--}}
        require(['hdjs', 'MarkdownIt', 'marked', 'highlight'], function (hdjs, MarkdownIt, marked) {
            //将markdown转为html代码：http://hdjs.hdphp.com/771125
            let md = new MarkdownIt();//markdown  内容
            let content = md.render($('textarea[name=content]').val());
            $('#content').html(content);
            //代码高亮  ？？怎么搞的
            $(document).ready(function () {
                $('pre code').each(function (i, block) {
                    hljs.highlightBlock(block);
                });
            });
        })
    </script>
@endpush