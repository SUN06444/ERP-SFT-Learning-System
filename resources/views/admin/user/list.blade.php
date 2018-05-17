@extends('admin_layout.master')

@include('admin_layout.partial.navigation')

@section('content')
<style>
    .layui-table,.layui-table th{
        text-align:center;
    }
    th img{
        width: 40px;
        height: 40px;
    }
</style>
    <div class="x-body">
        <span class="x-right" style="line-height:40px">共有数据：88 条</span>
        <table class="layui-table">
            <thead>
            <tr>
                <th>
                    No.
                </th>
                <th>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANoSURBVGhD7ZlLyA1hGMdf91vItaREEZIFti4LC2LLhpQUodzK57ZRSpYuRclKIXLJwsICkSTlrizsSK7JPeT6/70zz2k635mZM3Occ76p+dWv731m3u+d5zkz552Z97iSkpKSkq5AXzlFzujikiO5dqKbXCc/yb8F8aMkZ3KvsEmy86pcL1d1ccmRXMl5o/T0l1/kJWnVdQ//Gj3Cv0b1/qT+jBn91BoZC2w/Y16W5N6PDVxzVLaSQEyTn+V4Hzk3X36QI3zk3DL5UvbykXNb5aOg6dkrOYBxLNS4Iulj8L9bgqYf85Vc7qPgmBx7no+CnMiNHIGzQ+7U4GaGwRICsVASsx3WSOKpPnJumyQe7CPnDkkOZlyQT4Om53qowT76GPwvYwBjMvYeHwXHJCYHsFzJEciZ2OdaXUjWM9IhHwRND582l6lRfUY4W9VnhDGAMRm73jOSWAjUe50aSf2b9R2B1EKKQsOFTJRcDvvlTjlbtoPchfSWB+Vvyf9E5dofJVtJ7kKOS/qelZPZIEbK3fKnfCwHylaRqxBmL/od8VFnlkr2U1Qa9OX+E+daydmHFdK2b5ajpZGrkBOSqS/pE+ex4XnQjIUE30uOGSdnd5LkvvI13GbajRtyFXJHXguaseySjDXIR/Hw5DokwQHS4PHDtttN2MhVyEMZvSPXwu76Y3zUfHIVcldGn6FqwVTMWMN81HxyFXJavgmasdDnbdCMhTvzGXk7hzflHGnkKsTeWeb6qDPDJc9F530UD4VQcK1E06SQ6M03VyHMVu/kfck7TDWHZWXQFpG5EGahHdKmTabZCRKGSh7D2f4nbI+VrSBTIbPkC0mfW5LnK+Z54teR9il5Tv6S3yUvPXGkTb9mT5lE3YWwjUSfyeh3g7PBPeOk3Ccp1mDfDcmYB9hQRT03RDNtuq+rEGaHH/Ke5NPJAu8QRyXj2ktTFI4VfSSJ0yeYQGohfeQTyZmwN8OsUMxFyWXG40YzSC1ktWTbYh/lZ5z8Jvn+NIPUQliV2B40G2aRXBA0/zuphRSF1EKyLABAUv+2LT4UaYEusZDCLtA1umTazgU6WzKdTsAbGAvBHMCu5SzXKST1b9Z3hDG5TCuL2MDSPJUV8WeFDbIC1fGjCT+esLMI1vyhxyj8T28lJSUlJS3EuX8sRNm+2svFoQAAAABJRU5ErkJggg==">
                    暱稱
                </th>
                <th>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAIpSURBVGhD7dhPS1VBHMbxG7WoVUWLylUmtdboBUT5DsTegaJC0DILfQEiQUSLlhW9gRQV2qa4FP9uXGTgwjIozUVF1vfpemqYfvd2Rs85DjUPfOB6zsyc+R3PmdFbS0lJSfknchEjmMDLSExCczqPXDmDdXyP1CpOIldaMAVroMM0jrMIyhEMYAfWoFXaRi9y5xaO1z/+ymXMwrpAFabRBjcncLv+0c4alnDl50+/cwzD+ArrYmX4grs4CjdXsQLNtWF0MhvkHlSAGw2yDP+iRdPN7IAbzWUImpva5CokMwPr1/oAu3DbFuEb7sN/vC/Bf7yDCpFP0Iuml99NJ97Ab79fGus63OiafbAWnOBCMlr6zsHNaTyH1T7EM/h7gzY+bchWe9l3IfIOXfBzE+9h9WlmE93wo2M6Z/XJHKiQzBP4dzB0E9Xd9v/c0JhPYbX3FVKIvMY1uMmziepcP/x3Tu9HyPULK0S0yowi7yaqY1qB3KivViqN5bdvptBCMgtohxt3E9Xarz3A35e0VyzCGvNvSilEPuMOrJ1Y3KjNINTHGiuP0grJvIK/ibrRObWx+oYovRDZQg/86JjOWX1CVVJI5gX0/4OM7R0rSqWFyMYe69xBVF5IWVIhsUmFxCYVEptUSGz+j0LmYXWK0Rwa5hGsTjF6iIZpxUdYHWPyARfQNDfwFtYAMdDc/C/yGuYU9E2HHrXHkdBcNCfNLSUlJSUlJeXP1Go/ACE8JUehfMM8AAAAAElFTkSuQmCC">
                    email
                <th>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAFTSURBVGhD7dkhSwRRFMXxQTGKiJr8EAaD0WQyWAWDICKaxWYUZC02P4AgWESTBqP4KUwGi8GmRv1fGEEeZ1i5j+W9kXvgFxbeu+yZWWZgXxOJRCL/LvNYx04BW1hEdjbwjq/CLjAGV+xOfEANLmEXrtjPSQ0s5Rqu7EENLOUBrkSREamyyBMOsYKFlj1m7fMN1J7qihxhHF05htpXVZEzDEv1ReydNIthqb7IX98D1Rc5QJoZXOIZb61PqP3VFNlEmq6rr1RTZA1pbqHWKtUUWUUa+3JqrRJFcorYXm/OoWb2rsgj1MzeFXmFmtmrIlNQ80yRIvuYTkwgzSR+r1mGmmeKFFHi8duKIlGkQxRpRZEo0iGKtKLINtRAr9wi93DF/sJUA71yi5zAHTspUkM9coq8YA7u2HGXnRRdwW5tjiWkOYVa++MOA2SViEQikciI0jTfUqU49b0+FeMAAAAASUVORK5CYII=">
                    facebook_id
                </th>
                <th>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAATNSURBVGhD7Vn9T1tVGEbjLxr/Af8Eoz/5D5gY6W0LAro5FzbFaIxx4OLiB35sQTPZvb1QZAPZJGHDbMzBxjadgJFl4KD3g69hW6EoliEbzG3yoQYpXe/r+96dkq4eymaQU5UnedJ7bs95z/Pce97z0WasYxmUlMDdmbLxmCRrslPRm9xl5nmnajQ6ZO25R0s67mHV0huSbGS5VeNHp0ePFdT6F95sCsN7p8eh6EjIcqtm1F1m9GaX9N3HqqcnJI++U5J1q/hE2DrxXQRaR61beDywABv29UfoLT2u6A9mANzFmqYPJI/xLJnY9831vxhIZHXXLyApuk23qk84Ze1pFkI8cNzf71KN6fe/nOCKT2YL8ujgPLzdHLbw7cRcivYWCyUWlMTZZebimZEbXOGpuLfzGuCQjGWW+h5m4cTBqRiHihq+j/GE8ljZcQ0+D0WXys/XBiL4MLwsnDhklRmd754av0UsjzScio6M2PmRXzMIn337h33/nZMXwV1utLNw4oDTaguJiQumIVZnztlPvrTtsi204BM/YD7AywcD0D48BzsahuGZ6gE4NbwIxc1jmPhGKwsnDjS0dhwbtZN4d8slyKvotZ/6hso+2FpzAbYfHoK97T9Bd/h3GJu1bI5cvwFb91+A1xtHofBwCPPEOMjCiYND0XYX1AaiO3Hhy63ogXrfFAxfjS6JXo5n/NPg8hiwsao/hsY/YOHEwbFH24J5YpGotuAMVzSP4RkLcLaz316mom9m4cQBp896EvNEeQ9XcCo++dHNYYhbmzQYWh7tNCarLYonNhXzsI1LNcGh6CdZOHHAJ7qdhhXlB09sKlIbaotvpJCFE4eNXu1eXNCmNlX1c8WmIrXByWKSYrBwYoHbdjeuE1bw50WuYB4DVxZpbbFwsnCyMOJBB6Ys1byyv2OCK5rHmnMTQG3S7rDlVLQXcRqO+hIWvuVIdaiuQ/a9wJqnEfCghNv5xqcqeyLtoTmuAeLXw7M4w/VEMMkbhRyuXKp+LtdrdqdiXoXpy/EaUznlJmyu6rNeqvPDaw1DNuma7uV4TcDvJ6kuL0YiqU/W/eqBFi7PFz9AXef4mpD6oj5Z96sHChqc+BXWCtTXupFUWDfyN7EqRhx79OJkijLC08JkrgwKsKl6cCH/QGA+TlFGEjWQJrrHZK4Mqlx6dhYO9MWWKMpIogbSlNIIbvq2YYXfHLL+CpX/DUaSNdvAQidVoE8q0zXPyLZDfnjj6NCakPqiPhM1JBpJ1mwDT2gh+6aijVEy0XWykVePXRTCRA1xI3bSo9abmvUQs0HutMvMyAx+0c4zkg5cMoIaSat9jdqZDdtIF7vZReV0N8LTbEOS9Sq6SZ92ma7TmDzNNuiUJnm0R+KnNapQd37S/p0qnUia4kaSNXNBlc+mOByJImmKG7ktrBv5h7luhBdMJP/fRlL9pCOK9FPSHRlxe/S5pt6r3GAi2YiassuMaSZzZbhUo7mwPhgNc4KJImkp/DS46FL140zmyqD/vZ2KES1vG4PR6Rg38FqSNKitY4BnkIikmA8xmbcHSTZyXR5jfkvNwILagtvpjktCSH3nfzyw4EQtkkfPYfLuDNKHvQ/gdrkkWzW+yvGa3SJIfWOC7yItTNZ/GRkZfwJz9JsMVw9QzQAAAABJRU5ErkJggg==">
                    會員類型
                </th>
                <th>
                    <img src="data:image/png;base64,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">
                    加入時間
                </th>
                <th>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAFGSURBVGhD7ZmxSsNQFIaDQy7Y1+ir+RQOPoBgFwsu4uDQydEupZrEJa/QRVHaTqWIdkih7TEnZLiBG4j25JxrOD98ZEnO+b/AXZJAo9FoupFDZAaHOJx4Rd6prNc8+YMvEBvwCexU1mseFWkRFXENk0RFXMMkIRHJHg18P/CCO+0OJCLrewMfV7zgTrsDicgmf0OrO15wp92BRMQHVMQespsY2I55wZ12BxKRzhz2z5GB5ZAX3Gl3IBHxARVxDZOERITisO+fqsV+i4pUhjznRabHYc/7CyQiPqAirmGSqIhrmCT+i8zOABY39bxdACS9fyAyvwbI3t18pQBpv7jP/2+/dSK2RBzeAgQnZb3mERehkMCIilBJYMREKCUwIiLUEhh2kTYkMKwir+ftSGBYRZLT4kougWH/GRqZS3IJjUaj8TRB8AOW1A4boGihowAAAABJRU5ErkJggg==">
                    備註
                </th>
                <th>
                    <img src="data:image/png;base64,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">
                    操作
                </th>
            </tr>
            </thead>

            @if(session('user_type') == '管理員')

                    <tbody id="x-img">
                    @foreach($Get_AdminUser_data as $AdminUser_data)
                    <tr>
                        <td>
                            {{ $AdminUser_data->id }}
                        </td>
                        <td>
                            {{ $AdminUser_data->nickname }}
                        </td>
                        <td>
                            {{ $AdminUser_data->email }}
                        </td>
                        <td>
                            {{ $AdminUser_data->facebook_id}}
                        </td>
                        <td>
                            @if($AdminUser_data->type == 'A')
                                {{ '管理員' }}
                            @endif
                        </td>
                        <td>
                            {{ date('Y-m-d', strtotime($AdminUser_data->created_at)) }}
                        </td>
                        <td>
                            {{ $AdminUser_data->note }}
                        </td>

                        <td class="td-manage">
                            <a title="新增備註" href="javascript:;" onclick="banner_edit('新增備註','/admin/user/admin/edit/{{$AdminUser_data ->id}}','4','','510')"
                               class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

            @elseif(session('user_type') == '一般會員')
                <tbody id="x-img">
                @foreach($Get_GeneralUser_data as $GeneralUser_data)
                    <tr>
                        <td>
                            {{ $GeneralUser_data->id }}
                        </td>
                        <td>
                            {{ $GeneralUser_data->nickname }}
                        </td>
                        <td>
                            {{ $GeneralUser_data->email }}
                        </td>
                        <td>
                            {{ $GeneralUser_data->facebook_id}}
                        </td>
                        <td>
                            @if($GeneralUser_data->type == 'G')
                                {{ '一般會員' }}
                            @endif
                        </td>
                        <td>
                            {{ date('Y-m-d', strtotime($GeneralUser_data->created_at)) }}
                        <td>
                            {{ $GeneralUser_data->note }}
                        </td>

                        <td class="td-manage">
                            <a title="新增備註" href="javascript:;" onclick="banner_edit('新增備註','/admin/user/general/edit/{{$GeneralUser_data ->id}}','4','','510')"
                               class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            @endif


        </table>

            <!-- Pagination -->
            @if(session('user_type') == '管理員')
                {{  $Get_AdminUser_data->links() }}
            @endif
            <!-- Pagination -->
            @if(session('user_type') == '一般會員')
                {{  $Get_GeneralUser_data->links() }}
            @endif



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

        //批量删除提交
        function delAll () {
            layer.confirm('确认要删除吗？',function(index){
                //捉到所有被选中的，发异步进行删除
                layer.msg('删除成功', {icon: 1});
            });
        }
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