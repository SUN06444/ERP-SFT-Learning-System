@extends('admin_layout.master')

@section('content')

    <div class="x-body">

            @foreach($Get_OpenVideo_data as $OpenVideo_data)
                <form  class="layui-form" name="pass" id="pass" action="/admin/video/open/note/{{$OpenVideo_data->id}}" method="post">

                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span>備註
                    </label>
                    <div class="layui-input-block">
                        <textarea id="note" name="note"  class="layui-textarea">{{ $GeneralUser_data->note }}</textarea>
                    </div>

                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                        </label>
                            <button  class="layui-btn"  style="background-color: #1E9FFF;float: left;margin-right: 20px;" lay-filter="pass" lay-submit="">
                                審核通過
                            </button>
                            {{-- CSRF 欄位--}}
                            {{ csrf_field() }}
                    </div>

                </form>
            @endforeach

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
                        layer.alert("審核未通過，請點擊右上角重整畫面。", {icon: 6},function () {
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