@extends('admin_layout.master')

@include('admin_layout.partial.navigation')

@section('css_link')
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .layui-table,.layui-table th{
            text-align:center;
        }

    </style>
@endsection

@section('content')
    <div class="x-body">
        <!--
        <form class="layui-form x-center" action="" style="width:50%">
            <div class="layui-form-pane" style="margin-top: 15px;">
                <div class="layui-form-item">
                    <label class="layui-form-label" style="width:60px">所属分类</label>
                    <div class="layui-input-inline" style="width:120px;text-align: left">
                        <select name="fid">
                            <option value="0">顶级分类</option>
                            <option value="新闻">新闻</option>
                            <option value="新闻子类1">--新闻子类1</option>
                            <option value="新闻子类2">--新闻子类2</option>
                            <option value="产品">产品</option>
                            <option value="产品子类1">--产品子类1</option>
                            <option value="产品子类2">--产品子类2</option>
                        </select>
                    </div>
                    <div class="layui-input-inline" style="width:120px">
                        <input type="text" name="name"  placeholder="分类名" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="add"><i class="layui-icon">&#xe608;</i>增加</button>
                    </div>
                </div>
            </div>
        </form>
-->
        <table class="layui-table">
            <thead>
            <tr>
                <th>
                    No.
                </th>
                @if(session('channel_id') == '2')
                    <th>
                        會員ID
                    </th>
                @endif
                <th>
                    頻道名
                </th>
                <th>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAATzSURBVFhH7ZZ/TNR1GMe/2e/mlq2FDbYzND24QI6DC/IEBDG8AEWXSfJDQyR/ZWk1ZCxvrRAWNEVdk+busAksRXOC07iSSthy/OEfVFazzbM1a27aps1bbu+n5/PluYOb38QTWP1xr+295/s8z/v7+bzluKEWIUKECP8r6J7ojVgeswHV463oDdgydSNi5aK7I3YdamLX4vpTa/EFyzuuWodB1u/Tq+hRuS584tbgFKtJ2nHl6dfwYFwVkXkN5sgoPBIrkDm7ApeTVhNNpPgOd0oVPSLX3hmpFTDbV+Iv+yq0cF2Y+grlToSeLUc5n38xdRU8cvWdMbcc9Y4ynJF2QslYiXxHOW6G9VPMLsGBnBK0STsuuIgm1fQjobYf02Skk1tGppwSIlVlNDoLi9GmJO2Y2dNLkxt70dfYS6TrFHbISitYRiZnMZGqMhqdohfRpiTtmNnnxdtuL9FI7etBqtqpYEXLwgz40hK0KUk7Zo6ewI6jJ4hG6rPjVKR2yzjY8qVEqurmAKVLEFWyCK+XLkb1LVqEs7qMdkN6q7wQs+WoUenrQsY3x4DTXUS6juHS6W56TO3KCshUtphIVd2scLlo0up8nFtdgPMsb7iqLMAA60Zl4Z3/qRrsRN7gERxiub/vxEwZa1UcrLKASFUZadqr+YhZ/wLR2jyYZRQ265y4tCEfxdLeNSqYyhIScFMumTbnEakqo7DZnAff5uexU1pD+Pfq3k0LkPBGHmxVKXS/jEMwzFLNzdZcIlVlZMibCxBVnQtvQFvno0ZWGj/71Blc35VRCLULEFs9H9/qHl34kftkWQcxzOLixpVNpKqMDHFl0RT2NQSVNfyRbpsHn2sePmH5t2WHhqzNQKzas76szcY0F/9D2dPBuvpONqWITccwS4ODTNszieozkMkh7pNxkLosJNRnUW5A7HlIVkHqMuFjrXg/E866DPi3ZwyFfI/D8fMF3n3+YToe1s3MQf64t2fCw7ur9XOHQwayqCqjoWGTg0jXHFxvdOBA41xYZK3xrC24Z4W8LLDH94EDK9Qzv+9snAN/kwPNrAuskHABVEj2evjdK00SMpAl5I6d3OxKJ9qRhrRdaVjanIaTXG9yrSX+X7TYbgv7fbvThwIquHey/KzzRuECqJDN6fDwXVea0yglkEVVsWhaSwqZWuxELXYc2puK0oMWeoDrUu6vca0Xm/bRc4jaa4c3oJbU4S8J9z5WMKCC904+w89zwy9OABWS7/Gw/8rHdizRs3AmWWvafm5abUSeZJz02HCN9Z3bipluG3Jak/G3OxmFyudJoikeGzUElTz8JeFnH/tDAiparXC22uDnc0YNyR4P64bKojLJipfcdFiJVG1PwNT2JHg7rPh1vx2PdyShiXVutI+a3/HxO7cEVPDc2W6Fnz2jhmSfO5BFxrywkOlIIg+5Sj/5cAJ+Yu3k5ye53ux8Bg7d/C8cSYSvM9E4oIL3zsOJ8LNuG/KoBRaV5VMrnpCRpnXNREy3heiEefhPXXcc1ndbcFn95LriMdBlQbWsDGHPJfa/LK0hx+Ph5HP87DUMqe7qjsduPudnGQ3h0miS14wfesw4z/KKznjNRD2z0Mu7P1gXR+xC5J2FAeVlz1mj/Uix9zc5t99g/wvv/uyJQ5ZEG6Z/OqK+moEtX8+ghv9OqOwzI1oiRYgQIcLEo2n/ADY1rTTAgdi8AAAAAElFTkSuQmCC">
                    頻道縮圖 (請點擊)
                </th>
                <th>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAFxSURBVFhH7Zi/S8NAFMe7+j+IGKoNCJ06+Fc4SidX/4U6CWJRF3FoSQdTnKRud3Xo1iDYOFXEX5OTf0BBUlyN9+QFL0diTbiGE98HHpR7fe/7IbRDrkQQpmE5wcWyE4zlKrffVrCtDdip5kA2ttMRX3ywnGko13bvpc6865rOgp1qDmSjRjpJgp3Bbcg9X2vBTjUnt+BB/77Lh6MjnQU71ZzcglZrWsW2NmCnmvMrwaVOsLbVe623B3fh3uXjWdl5ry0efyxgWxuwE3bvsucWZEEmZGP7Z9jVTRV+J8wbHeLR3OBDf+crS2Ti0Wz+vOCpzTbcCmtkKZjB8RhzEXQr/Ny1eZipxAyOx/ivgqwpAsdKTSSZidITxZo4HqOwP4mQ+H6qKU8rCRKMIEEZEpQgwQgSlCFBCRKM6K7yddfub0LBZzyeSWGCecksaPxLk/GvnUmC+/zphHl+Q2fBTjUnt6DxVx9GXR4Zf/1GEIVSKn0CscvslyGcX9wAAAAASUVORK5CYII=">
                    頻道描述
                </th>
                <th>
                    <img src="data:image/png;base64,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">
                    頻道標籤
                </th>
                <th>
                    <img src="data:image/png;base64,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">
                    加入時間
                </th>
                <th>
                    <img src="data:image/png;base64,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">
                    操作
                </th>
            </tr>
            </thead>

                <tbody id="x-img">
                @foreach($Get_Channel_data as $Channel_data)
                    <tr>
                        <td>
                            {{ $Channel_data -> id }}
                        </td>
                        @if(session('channel_id') == '2')
                            <td>
                                {{ $Channel_data -> user_id }}
                            </td>
                        @endif
                        <td>
                            {{ $Channel_data -> name }}
                        </td>
                        <td>
                            <img  src="/img/machine.png" width="200" alt="">
                        </td>
                        <td>
                            {{ $Channel_data -> description }}
                        </td>
                        <td>
                            <div class="row video-{{$Channel_data->color}}-params">
                                <div class="col-md-12">
                                    <b># {{ $Channel_data -> name }}</b>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ date('Y-m-d', strtotime($Channel_data->updated_at))	 }}
                        </td>
                        <td class="td-manage">
                            <a title="编辑" href="javascript:;" onclick="cate_edit('編輯','/admin/subchannel/{{ session('channel') }}/edit/{{$Channel_data ->id}}','4','','510')"
                               class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

        </table>

        <div id="page"></div>
    </div>
    <script src="/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/js/x-layui.js" charset="utf-8"></script>
    <script>
        layui.use(['element','laypage','layer','form'], function(){
            $ = layui.jquery;//jquery
            element = layui.element();//面包导航
            laypage = layui.laypage;//分页
            layer = layui.layer;//弹出层

            layer.ready(function(){ //为了layer.ext.js加载完毕再执行
                layer.photos({
                    photos: '#x-img'
                    //,shift: 5 //0-6的选择，指定弹出图片动画类型，默认随机
                });
            });
            form = layui.form();


            //监听提交
            form.on('submit(add)', function(data){
                console.log(data);
                //发异步，把数据提交给php
                layer.alert("增加成功", {icon: 6});
                $('#x-img').prepend('<tr><td><input type="checkbox"value="1"name=""></td><td>1</td><td>1</td><td>'+data.field.name+'</td><td class="td-manage"><a title="编辑"href="javascript:;"onclick="cate_edit(\'编辑\',\'cate-edit.html\',\'4\',\'\',\'510\')"class="ml-5"style="text-decoration:none"><i class="layui-icon">&#xe642;</i></a><a title="删除"href="javascript:;"onclick="cate_del(this,\'1\')"style="text-decoration:none"><i class="layui-icon">&#xe640;</i></a></td></tr>');
                return false;
            });


        })




        //批量删除提交
        function delAll () {
            layer.confirm('确认要删除吗？',function(index){
                //捉到所有被选中的，发异步进行删除
                layer.msg('删除成功', {icon: 1});
            });
        }

        //-编辑
        function cate_edit (title,url,id,w,h) {
            x_admin_show(title,url,w,h);
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

