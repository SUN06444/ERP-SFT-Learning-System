@extends('admin_layout.master')

@section('content')

    <div class="x-body">
        @if(session('user_type') == '管理員')
            @foreach($Get_AdminUser_data as $AdminUser_data)
                <form  class="layui-form" name="update" id="update" action="/admin/user/admin/update/{{$AdminUser_data->id}}" method="post">
                    <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">
                            <span class="x-red">*</span>備註
                        </label>
                        <div class="layui-input-block">
                            <textarea id="note" name="note"  class="layui-textarea">{{ $AdminUser_data->note }}</textarea>
                        </div>

                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                        </label>
                        <button  class="layui-btn" lay-filter="add" lay-submit="">
                            新增備註
                        </button>
                    </div>
                    {{-- CSRF 欄位--}}
                    {{ csrf_field() }}
                </form>
            @endforeach

        @elseif(session('user_type') == '一般會員')
            @foreach($Get_GeneralUser_data as $GeneralUser_data)
                <form  class="layui-form" name="update" id="update" action="/admin/user/general/update/{{$GeneralUser_data->id}}" method="post">
                    <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">
                            <span class="x-red">*</span>備註
                        </label>
                        <div class="layui-input-block">
                            <textarea id="note" name="note"  class="layui-textarea">{{ $GeneralUser_data->note }}</textarea>
                        </div>

                    </div>

                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                        </label>
                        <button  class="layui-btn" lay-filter="add" lay-submit="">
                            新增備註
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
            form.on('submit(add)', function(data){
                $.ajax({
                    type: 'POST',
                    data: data,
                    success:
                        layer.alert("新增成功，請點擊右上角重整頁面", {icon: 6},function () {
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