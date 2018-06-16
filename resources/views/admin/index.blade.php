@extends('admin_layout.master')

@section('content')

    <div class="layui-layout layui-layout-admin">
        <div class="layui-header header header-demo">
            <div class="layui-main">
                <a class="logo" href="/index.html">
                    ERP廠區生產追蹤 Learning System 後台
                </a>
                <ul class="layui-nav" lay-filter="">
                    <li class="layui-nav-item">
                        <a href="javascript:;">admin</a>
                        <dl class="layui-nav-child"> <!-- 二级菜单 -->
                            <dd><a href="">个人信息</a></dd>
                            <dd><a href="/logout">登出</a></dd>
                        </dl>
                    </li>
                    <!-- <li class="layui-nav-item">
                      <a href="" title="消息">
                          <i class="layui-icon" style="top: 1px;">&#xe63a;</i>
                      </a>
                      </li> -->
                    <li class="layui-nav-item x-index"><a href="/">前台首頁</a></li>
                </ul>
            </div>
        </div>
        <div class="layui-side layui-bg-black x-side">
            <div class="layui-side-scroll">
                <ul class="layui-nav layui-nav-tree site-demo-nav" lay-filter="side">

                    <li class="layui-nav-item">
                        <a class="javascript:;" href="javascript:;">
                            <i class="layui-icon" style="top: 3px;">&#xe62d;</i><cite>頻道管理</cite>
                        </a>

                        <dl class="layui-nav-child">
                            <dd class="">
                            <dd class="">
                                <a href="javascript:;" _href="/admin/subchannel/official/list">
                                    <cite>官方頻道</cite>
                                </a>
                            </dd>
                            </dd>
                        </dl>
                        <dl class="layui-nav-child">
                            <dd class="">
                            <dd class="">
                                <a href="javascript:;" _href="/admin/subchannel/open/list">
                                    <cite>開放式頻道</cite>
                                </a>
                            </dd>
                            </dd>
                        </dl>


                    </li>
                    <li class="layui-nav-item">
                        <a class="javascript:;" href="javascript:;">
                            <i class="layui-icon" style="top: 3px;">&#xe634;</i><cite>影片管理</cite>
                        </a>
                        <dl class="layui-nav-child">
                            <dd class="">
                            <dd class="">
                                <a href="javascript:;" _href="/admin/video/official/list">
                                    <cite>官方影片列表</cite>
                                </a>
                            </dd>
                            </dd>
                        </dl>

                        <dl class="layui-nav-child">
                            <dd class="">
                            <dd class="">
                                <a href="javascript:;" _href="/admin/video/open/list">
                                    <cite>開放式影片列表</cite>
                                </a>
                            </dd>
                            </dd>
                        </dl>
                    </li>

                    <li class="layui-nav-item">
                        <a class="javascript:;" href="javascript:;">
                            <i class="layui-icon" style="top: 3px;">&#xe612;</i><cite>會員管理</cite>
                        </a>
                        <dl class="layui-nav-child">
                            <dd class="">
                                <a href="javascript:;" _href="/admin/user/admin/list">
                                    <cite>管理員管理</cite>
                                </a>
                            </dd>
                            <dd class="">
                                <a href="javascript:;" _href="/admin/user/general/list">
                                    <cite>一般會員管理</cite>
                                </a>
                            </dd>
                        </dl>
                    </li>

                    <li class="layui-nav-item" style="height: 30px; text-align: center">
                    </li>
                </ul>
            </div>

        </div>

        <div class="layui-tab layui-tab-card site-demo-title x-main" lay-filter="x-tab" lay-allowclose="true">
            <div class="x-slide_left"></div>
            <ul class="layui-tab-title">
                <li class="layui-this">
                    我的桌面
                    <i class="layui-icon layui-unselect layui-tab-close">ဆ</i>
                </li>
            </ul>
            <div class="layui-tab-content site-demo site-demo-body">
                <div class="layui-tab-item layui-show">
                    <iframe frameborder="0" src="/welcome.html" class="x-iframe"></iframe>
                </div>
            </div>
        </div>
        <div class="site-mobile-shade">
        </div>
    </div>
    <script src="/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/js/x-admin.js"></script>
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
