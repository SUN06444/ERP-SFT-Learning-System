@extends('admin_layout.master')

@section('content')

    <div class="x-body">
        @if(session('video_type') == '官方影片')
            @foreach($Get_Video_data as $Video_data)
                <form  class="layui-form" name="update" id="update" action="/admin/video/official/update/{{$Video_data->id}}" method="post">
                    <div class="layui-form-item">
                        <label for="link" class="layui-form-label">
                            <span class="x-red">*</span>標題
                        </label>

                        <div class="layui-input-inline">
                            <input type="text" id="title" name="title" required="" lay-verify="required" value="{{$Video_data->title}}"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label  class="layui-form-label">影片
                        </label>

                        <iframe  style="border-radius: 16px; margin:0 auto;" width="600" height="350" src="https://www.youtube.com/embed/{{ $Video_data->video_id }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>

                        </iframe>

                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">頻道名</label>
                        <div class="layui-input-block">

                            <select name="name" lay-verify="required">
                                <option value="{{ $Video_data->name }}">{{ $Video_data->name }}</option>
                                @foreach($Get_Other_subchannel as $subchannel)
                                    <option value="{{ $subchannel->name }}">{{ $subchannel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">
                            <span class="x-red">*</span>作者
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="author" name="author" required="" lay-verify="required" value="{{ $Video_data->author }}"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">
                            <span class="x-red">*</span>影片ID
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="video_id" name="video_id" required="" lay-verify="required" value="{{ $Video_data->video_id }}"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">
                            <span class="x-red">*</span>內容
                        </label>
                        <div class="layui-input-block">
                            <textarea id="content" name="content"  class="layui-textarea">{{ $Video_data->content }}</textarea>
                        </div>

                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                        </label>
                        <button  class="layui-btn" lay-filter="update" lay-submit="">
                            編輯
                        </button>
                    </div>
                    {{-- CSRF 欄位--}}
                    {{ csrf_field() }}
                </form>
            @endforeach

        @elseif(session('video_type') == '開放式影片' && session('status') == 'edit')
            @foreach($Get_Video_data as $Video_data)
                    <div class="layui-form-item">
                        <label  class="layui-form-label">影片
                        </label>
                        <iframe  style="border-radius: 16px; margin:0 auto;" width="600" height="350" src="https://www.youtube.com/embed/{{ $Video_data->video_id }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>

                        </iframe>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                        </label>
                        <form  class="layui-form" name="pass" id="pass" action="/admin/video/open/pass/{{$Video_data->id}}" method="post">
                            <button  class="layui-btn"  style="background-color: #1E9FFF;float: left;margin-right: 20px;" lay-filter="pass" lay-submit="">
                                審核通過
                            </button>
                            {{-- CSRF 欄位--}}
                            {{ csrf_field() }}
                        </form>

                        <form  class="layui-form" name="nopass" id="nopass" action="/admin/video/open/nopass/{{$Video_data->id}}" method="post">
                            <button  class="layui-btn layui-btn-danger" lay-filter="nopass" lay-submit="">
                                No Pass
                            </button>
                            {{-- CSRF 欄位--}}
                            {{ csrf_field() }}
                        </form>
                    </div>

            @endforeach

        @elseif(session('video_type') == '開放式影片' && session('status') == 'note')
            @foreach($Get_Video_data as $Video_data)
                <form  class="layui-form" name="note" id="note" action="/admin/video/open/note/{{$Video_data->id}}" method="post">
                    <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">
                            <span class="x-red">*</span>問題
                        </label>
                        <div class="layui-input-block">
                            <textarea id="note" name="note"  class="layui-textarea">{{ $Video_data->note }}</textarea>
                        </div>

                    </div>

                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                        </label>
                        <button  class="layui-btn" lay-filter="note" lay-submit="">
                            新增問題
                        </button>
                    </div>
                    {{-- CSRF 欄位--}}
                    {{ csrf_field() }}
                </form>
            @endforeach
        @endif
    </div>
    <script src="/lib/layui/layui.js" charset="utf-8">
    </script>
    <script src="/js/x-layui.js" charset="utf-8">
    </script>
    <script>
        layui.use(['form','layer','upload'], function(){
            $ = layui.jquery;
            var form = layui.form()
                ,layer = layui.layer;


            //图片上传接口
            layui.upload({
                url: './upload.json' //上传接口
                ,success: function(res){ //上传成功后的回调
                    console.log(res.code);
                    $('#LAY_demo_upload').attr('src',res.url);
                }
            });

            //监听提交
            form.on('submit(update)', function(data){
                $.ajax({
                    type: 'POST',
                    data: data,
                    success:
                        layer.alert("影片更新成功，請點擊右上角重整畫面。", {icon: 6},function () {
                            //window.parent.location.reload();
                            // 获得frame索引
                            var index = parent.layer.getFrameIndex(window.name);
                            //关闭当前frame
                            parent.layer.close(index);
                        })
                });

                console.log(data);
                //发异步，把数据提交给php
                return false;

            });

            //监听提交
            form.on('submit(pass)', function(data){
                $.ajax({
                    type: 'POST',
                    data: data,
                    success:
                        layer.alert("審核通過，影片成功上架，請點擊右上角重整畫面。", {icon: 6},function () {
                            //window.parent.location.reload();
                            // 获得frame索引
                            var index = parent.layer.getFrameIndex(window.name);
                            //关闭当前frame
                            parent.layer.close(index);
                        })
                });

                console.log(data);
                //发异步，把数据提交给php
                return false;

            });

            //监听提交
            form.on('submit(nopass)', function(data){
                $.ajax({
                    type: 'POST',
                    data: data,
                    success:
                        layer.alert("審核未通過，請點擊右上角重整畫面。", {icon:3},function () {
                            //window.parent.location.reload();
                            // 获得frame索引
                            var index = parent.layer.getFrameIndex(window.name);
                            //关闭当前frame
                            parent.layer.close(index);
                        })
                });

                console.log(data);
                //发异步，把数据提交给php
                return false;

            });

            form.on('submit(note)', function(data){
                $.ajax({
                    type: 'POST',
                    data: data,
                    success:
                        layer.alert("新增影片問題成功，可寄信通知會員了。", {icon: 6},function () {
                            //window.parent.location.reload();
                            // 获得frame索引
                            var index = parent.layer.getFrameIndex(window.name);
                            //关闭当前frame
                            parent.layer.close(index);
                        })
                });

                console.log(data);
                //发异步，把数据提交给php
                return false;

            });


        });
    </script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>

@endsection