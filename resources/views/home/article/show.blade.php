@extends('home.layouts.master')
@section('content')
    {{--展示文章内容  --}}
    <div class="container">
        <div class="row edu-topic-show mt-3">
            <div class="col-12 col-xl-9">
                <div class="card card-body p-5">
                    <div class="row">
                        <div class="col text-right">
                            <a href="http://www.houdunren.com/common/favorite?model=EduTopic&amp;id=60" class="btn btn-xs">
                                <i class="fa fa-heart-o" aria-hidden="true"></i> 收藏</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <h2 class="mb-4">
                                {{$article['title']}}
                            </h2>
                            <p class="text-muted mb-1 text-muted small">
                                <a href="" class="text-secondary">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                </a><a href="" class="text-secondary">{{$article->user->name}}</a>

                                <i class="fa fa-clock-o ml-2" aria-hidden="true"></i>
                                {{$article->created_at->diffForHumans()}}

                                <a href="" class="text-secondary">
                                    <i class="fa fa-folder-o ml-2" aria-hidden="true"></i>
                                    {{$article->category->title}}
                                </a>

                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-5">
                            <div class="markdown editormd-html" id="content">
                                <textarea name="content" id="" hidden cols="30" rows="10"> {{$article->content}}</textarea>
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
                            <a href="">
                                <img src="{{$article->user->icon}}" alt="..." class="avatar-img rounded-circle">
                            </a>
                        </div>
                    </div>
                    @auth()
                        @can('isNotMine',$article->user)
                            <div class="card-footer text-muted">
                                {{--文章作者--}}
                                <a class="btn btn-white btn-block btn-xs" href="{{route('member.attention',$article->user)}}">
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
        require(['hdjs','MarkdownIt','marked', 'highlight'], function (hdjs,MarkdownIt,marked) {
            //将markdown转为html代码：http://hdjs.hdphp.com/771125
            let md = new MarkdownIt();//markdown  内容
            let content = md.render($('textarea[name=content]').val());
            $('#content').html(content);
            //代码高亮  ？？怎么搞的
            $(document).ready(function() {
                $('pre code').each(function(i, block) {
                    hljs.highlightBlock(block);
                });
            });
        })
    </script>
@endpush