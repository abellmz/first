<div class="card" id="app">
    <div class="card-body">
        <!-- Comments                   值       属性      循环出属性中的内容 -->
        <div class="comment mb-3" v-for="v in comments">
            <div class="row">
                <div class="col-auto">
                    <!-- Avatar -->
                    <a class="avatar" href="">
                        {{--绑定属性    每条数据的 用户 头像--}}
                        <img :src="v.user.icon" alt="..." class="avatar-img rounded-circle">
                    </a>
                </div>
                <div class="col ml--2">
                    <!-- Body -->
                    <div class="comment-body">
                        <div class="row">
                            <div class="col">
                                <!-- Title -->
                                <h5 class="comment-title">
                                    @{{v.user.name}}
                                </h5>
                            </div>
                            <div class="col-auto">
                                <!-- Time -->
                                <time class="comment-time">
                                    @auth()
                                        <a href="" @click.prevent="zan(v)" class="text-muted">👍 @{{ v.zan_num }}</a>
                                        |@{{v.created_at }}
                                    @else
                                        <a href="{{route('login',['from'=>url()->full()])}}" class="text-muted">👍 @{{ v.zan_num }}</a>
                                        |@{{v.created_at }}
                                    @endauth
                                </time>
                            </div>
                        </div>
                        <!-- Text -->
                        <p class="comment-text" v-html="v.content">
                        </p>
                    </div>
                </div>
            </div> <!-- / .row -->
        </div>
        <!-- Divider -->
        <hr>
        <!-- Form -->
        @auth()
            <div class="row align-items-start">
                <div class="col-auto">

                    <!-- Avatar -->
                    <div class="avatar">
                        <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                    </div>

                </div>
                <div class="col ml--2">

                    <div id="editormd">
                        <textarea style="display:none;"></textarea>
                    </div>
                    <button class="btn btn-primary" @click.prevent="send()">发表评论</button>
                </div>
            </div> <!-- / .row -->
        @else             {{--         记住未登录时的页面--}}
        <p class="text-muted text-center">请 <a href="{{route('login',['from'=>url()->full()])}}">登录</a> 后评论</p>
        @endauth
    </div>
</div>
@push('js')
    <script>
        {{--require是js的一种语法--}}
        {{--require（）第一个参数是路径数组  作为第二个函数的参数  之后可以直接在函数中使用  hdjs中自带highlight，可以不引入，那--}}
        require(['hdjs', 'vue', 'axios', 'MarkdownIt', 'marked', 'highlight'], function (hdjs, Vue, axios, MarkdownIt, marked) {
            // 下面整体都是vue  json和vue都是js,那怎么区分，带有{}可以理解为是json
            var vm = new Vue({
                // 整个页面div的id=app  抓取div
                el: '#app',
                data: {//数据：属性中的属性
                    comment: {content: ''},//当前评论数据
                    comments: [],//全部评论
                },
                //更新
                updated() {
                    //代码高亮
                    $(document).ready(function () {
                        $('pre code').each(function (i, block) {
                            hljs.highlightBlock(block);
                        });
                    });
                },
                //方法
                methods: {
                    @auth
                    //点击事件  提交评论
                    send() {
                        //判断 评论不能为空    去两边提示后-如果为空
                        if (this.comment.content.trim() == '') {
                            //hdjs用法 错误提示（一条错误提示的三个属性）
                            hdjs.swal({
                                text: '请输入评论内容',
                                button: false,
                                icon: 'warning'
                            });
                            return false;
                        }
                        //一个第三方库插件  post提交 链接路由  存储       传递参数  评论内容和文章id
                        axios.post('{{route('home.comment.store')}}', {
                            content: this.comment.content,
                            article_id: '{{$article['id']}}'
                        }).then((response) => {//链式操作   成功响应
                            //  console.log(response.data.comment);
                            //this调用属性 追加    应答中data的属性comment(vue语法)
                            this.comments.push(response.data.comment);
                            //将 markdown 转为 html
                            let md = new MarkdownIt();//给content赋值为html语法内容
                            // console.log(response.data.comment.content);
                            response.data.comment.content = md.render(response.data.comment.content)
                            // console.log(response.data.comment.content);//转换后打听出来也没什么变化呀？
                            //清空 vue 数据
                            this.comment.content = '';
                            //清空编辑器内容
                            //选中所有内容        从行       从列     到行              到列
                            editormd.setSelection({line: 0, ch: 0}, {line: 99999999, ch: 999999999});
                            //将选中文本替换成空字符串
                            editormd.replaceSelection("");
                        })
                    },
                    zan(v) {
                        // alert('1');
                        let url = '/home/zan/make?type=comment&id=' + v.id;
                        axios.get(url).then((response) => {
                            // console.log(response.data.zan_num);
                            v.zan_num = response.data.zan_num;
                        })
                    }
                    @endauth
                },//事件完成  post提交
                //挂载 最先运行
                mounted() {
                    @auth
                    //渲染编辑器     hdjs中将编辑器editormd的调用变量 设为editormd
                    hdjs.editormd("editormd", {
                        width: '100%',
                        height: 300,
                        //工具栏
                        toolbarIcons: function () {//工具栏
                            return [
                                "undo", "redo", "|",
                                "bold", "del", "italic", "quote", "|",
                                "list-ul", "list-ol", "hr", "|",
                                "link", "hdimage", "code-block", "|",
                                "watch", "preview", "fullscreen"
                            ]
                        },
                        //后台上传地址，默认为 hdjs配置项window.hdjs.uploader
                        server: '',
                        //editor.md库位置
                        path: "{{asset('org/hdjs')}}/package/editor.md/lib/",
                        //监听编辑器变化
                        onchange: function () {
                            //给 vue 对象中 comment 属性中 content  设置值
                            vm.$set(vm.comment, 'content', this.getValue());
                        }
                    });
                    @endauth
                    //请求当前文章所有评论数据  位于挂载中 最先运行的一批 在vue中的顺序不用管
                    //get请求运行完后 运行response 即应答输出
                    axios.get('{{route("home.comment.index",['article_id'=>$article['id']])}}')
                        .then((response) => {
                            // console.log(response.data.comments)
                            this.comments = response.data.comments;
                            let md = new MarkdownIt();
                            //console.log(this.comments);
                            this.comments.forEach((v, k) => {
                                v.content = md.render(v.content)
                            })
                        });
                }
            });
        })
    </script>
@endpush