<nav class="navbar" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand"
           style="font-family:Microsoft YaHei; padding: 12px 0px;
                    margin-right:15px;font-size: 20px; color:  burlywood;"
           href="/">
            <iframe src="https://image.flaticon.com/icons/svg/167/167734.svg" width="40" height="35"
                    style="float: left;margin-right:8px;border: unset;">

            </iframe>
            <span>ERP</span>廠區生產追蹤<br/>
            <span style="margin-top: 1px;font-size: 15px;float: right;color:#26abe2ba;font-style: oblique;">
                Learning System
            </span>
        </a>
        <div class="navbar-right menu-main">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>官方頻道</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">

                    @foreach($Get_OfficialChannel_data_For_Nav as $Nav_OfficialChannel_data)
                        <li><a href="/channel/{{ $Nav_OfficialChannel_data->name }}">{{ $Nav_OfficialChannel_data->name }}</a></li>
                    @endforeach

                </ul>
            </li>
            <li><a href="/channel/open/subchannel"><span>開放式頻道</span></a></li>
            <li><a href="/test"><span>教學案例</span></a></li>

            <li><a href="contact.htm"><span>聯絡我們</span></a></li>
        </ul>
        </div>
    </div>



    <div class="collapse navbar-collapse">
        <div class="navbar-right menu-main">
            <ul class="nav navbar-nav">

                @if(session()->has('user_id'))
                    <!--
                    <li class="am-dropdown" data-am-dropdown>
                        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                            <span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">0</span>

                        </a>


                        <ul class="am-dropdown-content">
                            <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
                            <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                            <li><a href="#"><span class="am-icon-power-off"></span> 退出</a></li>
                        </ul>
                    </li>
-->
                    <li class="dropdown" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #26abe2;"><span>{{ session('user_nickname')}}</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/user/videos/collect/{{ session('user_id')}}">檢視影片</a></li>
                            <li><a href="/user/videos/subscribes">我的訂閱</a></li>

                            <li><a href="/user/auth/sign-out">登出</a></li>
                        </ul>
                    </li>
                @else
                    <a style="margin: 10px; font-weight: 500;" class="btn btn-default" href="/user/auth/sign-up">註冊</a>
                    <a style="font-weight: 500;" class="btn btn-orange" href="/user/auth/sign-in">登入</a>
                @endif

            </ul>
<!--

-->
        </div>
    </div>
</nav>