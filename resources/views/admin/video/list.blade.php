@extends('admin_layout.master')

@include('admin_layout.partial.navigation')

@section('content')

    <div class="x-body">
        <span class="x-right" style="line-height:40px">共有数据：88 条</span>
        <table class="layui-table">
            <thead>
            <tr>
                <th style="width: 1%">
                    影片ID
                </th>
                <th style="width: 1%">
                    會員ID
                </th>
                <th>
                    影片標題
                </th>
                <th>
                    影片縮圖
                </th>
                <th style="width: 6%">
                    頻道名稱
                </th>
                <th>
                    作者
                </th>
                <th>
                    Youtube
                    <br>影片ID
                </th>
                <th>
                    內容
                </th>

                <th>
                    加入時間
                </th>
                <th>
                    狀態
                </th>
                @if(session('video_type') == '開放式影片')
                    <th style="width: 10%">
                        備註
                    </th>
                @endif
                <th style="width: 6%">
                    @if(session('video_type') == '官方影片')
                        操作
                    @elseif(session('video_type') == '開放式影片')
                        影片審核
                    @endif
                </th>

            </tr>
            </thead>

                <tbody id="x-img">
                @foreach($Get_Video_data as $Video_data)
                    <tr>
                        <td>
                            {{ $Video_data->id }}
                        </td>
                        <td>
                            {{ $Video_data->user_id }}
                        </td>
                        <td>
                            {{ $Video_data->title }}
                        </td>
                        <td>
                            <img  src="http://img.youtube.com/vi/{{ $Video_data->video_id }}/mqdefault.jpg" width="200" alt="">
                        </td>
                        <td>
                            {{ $Video_data->name }}
                        </td>
                        <td style="width: 8%;">
                            {{ $Video_data->author }}
                        </td>
                        <td>
                            {{ $Video_data->video_id }}
                        </td>

                        <td style="width: 25%;">
                            {{ $Video_data->content }}
                        </td>

                        <td style="width: 7%;">
                            {{ date('Y-m-d', strtotime($Video_data->created_at)) }}
                        </td>
                        <td class="td-status">
                            @if($Video_data->status == '0')
                                <span class="layui-btn layui-btn-danger layui-btn-mini">
                                    待審核
                                </span>
                            @elseif($Video_data->status == '1')
                                <span class="layui-btn layui-btn-normal layui-btn-mini">
                                    影片上架
                                </span>
                            @elseif($Video_data->status == '2')
                                <span class=" layui-btn layui-btn-disabled layui-btn-mini" style="text-decoration: line-through;">
                                    審核未通過!
                                </span>
                            @endif
                        </td>
                        @if(session('video_type') == '開放式影片')
                        <td>
                                {{ $Video_data->note }}
                        </td>
                        @endif
                        <td class="td-manage">
                            @if(session('video_type') == '官方影片')
                                <a title="编辑" href="javascript:;" onclick="banner_edit('编辑','/admin/video/official/edit/{{$Video_data ->id}}','4','','510')"
                                   class="ml-5" style="text-decoration:none">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <a title="删除" href="javascript:;" onclick="banner_del(this,'1')"
                                   style="text-decoration:none">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>
                            @elseif(session('video_type') == '開放式影片')
                                <a title="影片審核" href="javascript:;" onclick="banner_edit('影片審核','/admin/video/open/edit/{{$Video_data ->id}}','4','','510')"
                                   class="ml-5" style="text-decoration:none">
                                    <i class="layui-icon">&#xe622;</i>
                                </a>
                                <a title="新增備註(影片問題)" href="javascript:;" onclick="banner_note('新增備註 (影片問題)','/admin/video/open/note/{{$Video_data ->id}}','4','','510')"
                                   style="text-decoration:none">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>

        </table>
        <!-- Pagination -->

            {{  $Get_Video_data->links() }}



        <div id="page"></div>
    </div>
    <script src="/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/js/x-layui.js" charset="utf-8"></script>
    <script>
        layui.use(['laydate','element','laypage','layer'], function(){
            $ = layui.jquery;//jquery
            laydate = layui.laydate;//日期插件
            element = layui.element();//面包导航
            laypage = layui.laypage;//分页
            layer = layui.layer;//弹出层

            //以上模块根据需要引入

            layer.ready(function(){ //为了layer.ext.js加载完毕再执行
                layer.photos({
                    photos: '#x-img'
                    //,shift: 5 //0-6的选择，指定弹出图片动画类型，默认随机
                });
            });

        });

        /*添加*/
        function banner_add(title,url,w,h){
            x_admin_show(title,url,w,h);
        }
        /*停用*/
        function banner_stop(obj,id){
            layer.confirm('确认不显示吗？',function(index){
                //发异步把用户状态进行更改
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="banner_start(this,id)" href="javascript:;" title="显示"><i class="layui-icon">&#xe62f;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">不显示</span>');
                $(obj).remove();
                layer.msg('不显示!',{icon: 5,time:1000});
            });
        }

        /*启用*/
        function banner_start(obj,id){
            layer.confirm('确认要显示吗？',function(index){
                //发异步把用户状态进行更改
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="banner_stop(this,id)" href="javascript:;" title="不显示"><i class="layui-icon">&#xe601;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已显示</span>');
                $(obj).remove();
                layer.msg('已显示!',{icon: 6,time:1000});
            });
        }

        // 编辑
        function banner_edit (title,url,id,w,h) {
            x_admin_show(title,url,w,h);
        }
        // note備註
        function banner_note (title,url,id,w,h) {
            x_admin_show(title,url,w,h);
        }
        /*删除*/
        function banner_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                //发异步删除数据
                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
            });
        }
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