@extends('admin_layout.master')

@section('content')



    <div class="x-body">
            @foreach($Get_SubChannel_data as $SubChannel_data)
               <form  class="layui-form" name="update" id="update" action="/admin/subchannel/{{ session('channel') }}/update/{{$SubChannel_data->id}}" method="post">
                    <div class="layui-form-item">
                        <label for="link" class="layui-form-label">
                            <span class="x-red">*</span>頻道名
                        </label>

                            <div class="layui-input-inline">
                                <input type="text" id="name" name="name" required="" lay-verify="required" value="{{$SubChannel_data->name}}"
                                       autocomplete="off" class="layui-input">
                            </div>
                    </div>
                    <div class="layui-form-item">
                        <label  class="layui-form-label">頻道縮圖
                        </label>
                        <img id="LAY_demo_upload" width="300" src="/images/banner.png">
                    </div>
                    <div class="layui-form-item">
                        <label for="link" class="layui-form-label">
                            <span class="x-red"></span>更改圖片?
                      </label>
                        <div class="layui-input-inline">
                            <div class="site-demo-upbar">
                                <input type="file" name="file" class="layui-upload-file" id="test">
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">
                            <span class="x-red">*</span>頻道描述
                        </label>
                        <div class="layui-input-block">
                            <textarea id="description" name="description"  class="layui-textarea">{{ $SubChannel_data->description }}</textarea>
                        </div>

                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                        </label>
                        <button  class="layui-btn" lay-filter="add" lay-submit="">
                            編輯
                        </button>
                    </div>
                   {{-- CSRF 欄位--}}
                   {{ csrf_field() }}
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
            form.on('submit(add)', function(data){
                $.ajax({
                    type: 'POST',
                    data: data,
                    success:
                        layer.alert("編輯成功，請等待頁面重整", {icon: 6},function () {
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