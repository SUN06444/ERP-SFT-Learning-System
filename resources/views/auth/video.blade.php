@extends('layout.master')

@section('title', $title)

@section('css_link')

    <link rel="stylesheet" href="/layui/css/layui.css">

    <link rel="stylesheet" href="/css/theme.css">
    <style>

        .navecation ul li{
            list-style:none;
            float:left;
            padding-right:20px;
        }
        .navecation ul li a{
            text-decoration:none;
            color:#222;
            background-color:#ccc;
            padding:4px 5px;
        }

        .navecation ul li .active{
            background-color:#d90000;
            color:#fff;

        }

        img{
            height: inherit;
        }

    </style>


@endsection



@section('content')

    @if(session('sort') == 'collect')
        <script>
            $(function() {
                $('li .val1').addClass("active");
            });
        </script>


    @elseif(session('sort') == 'likes')
        <script>
            $(function() {
                $('li .val2').addClass("active");
            });
        </script>


    @elseif(session('sort')== 'subscribe')
        <script>
            $(function() {
                $('li .val3').addClass("active");
            });
        </script>
    @else
        <script>
            $(function() {
                $('li a').removeClass("active");
            });
        </script>
    @endif




    <section class="content content-light  videos-list videos-list-grid">

        <div class="container">

            <div class="filter"style="
                                    min-height: 50px;
                                    padding-right: 20px;
                                    padding-left: 20px;
                                    background-color: #fafafa;
                                    background-image: -moz-linear-gradient(top,#fff,#f2f2f2);
                                    background-image: -o-linear-gradient(top,#fff,#f2f2f2);
                                    background-repeat: repeat-x;
                                    border: 1px solid #d4d4d4;
                                    -webkit-border-radius: 4px;
                                    -moz-border-radius: 4px;
                                    border-radius: 4px;
                                    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#fff2f2f2', GradientType=0);
                                    -webkit-box-shadow: 0 1px 4px rgba(0,0,0,.065);
                                    -moz-box-shadow: 0 1px 4px rgba(0,0,0,.065);
                                    box-shadow: 0 1px 4px rgba(0,0,0,.065);
                                    /* background-color: #fafafa; */
                                ">

                <nav class="navecation" >

                    <ul id="navi" style="margin-top: 10px;">
                        <li><a class="val1" href="/user/videos/collect/{{session('user_id')}}">個人收藏區</a></li>
                        <li><a class="val2" href="/user/videos/likes/{{session('user_id')}}">個人喜愛區</a></li>
                    </ul>
                </nav>

            </div>

            <br/>
            @if(session('sort') == 'collect')
                @if( (count($Get_Official)== 0) && (count($Get_Open) == 0))
                    <div class="video_tip" style="height: 55%">
                        {{ "--目前尚無收藏--" }}
                    </div>

                @endif

            @elseif(session('sort') == 'likes')
                @if( (count($Get_Official)== 0) && (count($Get_Open) == 0))
                    <div class="video_tip" style="height: 55%">
                        {{ "--目前尚無喜愛的影片--" }}
                    </div>

                @endif
            @endif

            @if(count($Get_Official)>0 )
                <hr class="invisible"  style="margin-bottom: 20px;">
                <div class="title-container" style="width: 100%;border-bottom: 1px solid #0000001c;">
                    <span style="font-size: 23px;" >「Official 官方」</span><span> 頻道：<br/></span>
                </div>

                <div class="row" style="display: flex;flex-wrap: wrap;margin-top: 10px;">


                    @foreach($Get_Official as $Official_data)

                        <article class="col-md-3 video-item"
                                 style="background-color:white;
                            -webkit-box-shadow: inset 0 0 5px white;
                            -moz-box-shadow: inset 0 0 10px white;
                            box-shadow: inset 0 0 1px #666;
                            padding-top: 15px;
                            position: relative;
                            overflow: hidden;">

                            <div class="row video-tag-params" style="float: left;" >
                                <div class="col-md-12">
                                    @if(session('sort') == 'collect')
                                        <b>★ 收藏</b>
                                    @endif
                                    @if(session('sort') == 'likes')
                                        <b>❤ 喜愛</b>
                                    @endif

                                </div>
                            </div>

                            <div class="row video-{{$Official_data->color}}-params" style="float: right;">
                                <div class="col-md-12">
                                    <b>#{{ $Official_data->name }}</b>
                                </div>
                            </div>

                            @if(session('sort') == 'collect')
                                <a href="/video/{{ $Official_data->name }}/{{ $Official_data->video_id }}" class="video-prev video-prev-small" style="margin-top: 35px;">
                                    <img  width="100%" height="100%" src='http://img.youtube.com/vi/{{ $Official_data->video_id }}/mqdefault.jpg'></a>
                            @endif
                            @if(session('sort') == 'likes')
                                <a href="/video/{{ $Official_data->name }}/{{ $Official_data->video_id }}" class="video-prev video-prev-small" style="margin-top: 35px;">
                                    <img  width="100%" height="100%" src='http://img.youtube.com/vi/{{ $Official_data->video_id }}/mqdefault.jpg'></a>
                            @endif

                            <h3 class="video-title" >
                                <a href="/test3"> {{ $Official_data->title }}</a></h3>

                            @if(session('sort') == 'collect')

                                <form name="dislike" id="dislike" action="/channel/{{$Official_data->collect_video_id}}/discollect" method="post">
                                    <button class="btn btn-link" style="float: right;margin-bottom: 5px; padding: 0px 3px;"> <i class="fa fa-trash-o"></i>刪除收藏</button>
                                    {{-- CSRF 欄位--}}
                                    {{ csrf_field() }}
                                </form>

                            @endif

                            @if(session('sort') == 'likes')

                                <form name="dislike" id="dislike" action="/channel/{{$Official_data->like_video_id}}/dislike" method="post">
                                    <button class="btn btn-link" style="float: right;margin-bottom: 5px; padding: 0px 3px;"> <i class="fa fa-trash-o"></i>刪除喜愛</button>
                                    {{-- CSRF 欄位--}}
                                    {{ csrf_field() }}
                                </form>

                            @endif

                        </article>
                    @endforeach

                </div>
            @endif

            @if(count($Get_Open)>0 )
                <hr class="invisible" />
                <div class="title-container" style="width: 100%;border-bottom: 1px solid #0000001c;">
                    <span style="font-size: 23px;" >「Open 開放式」</span><span> 頻道：<br/></span>
                </div>

                <div class="row" style="display: flex;flex-wrap: wrap;margin-top: 10px;">

                    @foreach($Get_Open as $Open_data)

                        <article class="col-md-3 video-item"
                                 style="background-color:white;
                            -webkit-box-shadow: inset 0 0 5px white;
                            -moz-box-shadow: inset 0 0 10px white;
                            box-shadow: inset 0 0 1px #666;
                            padding-top: 15px;
                            position: relative;
                            overflow: hidden;">

                            <div class="row video-tag-params" style="float: left;" >
                                <div class="col-md-12">
                                    @if(session('sort') == 'collect')
                                        <b>★ 收藏</b>
                                    @endif
                                    @if(session('sort') == 'likes')
                                        <b>❤ 喜愛</b>
                                    @endif

                                </div>
                            </div>

                            <div class="row video-{{$Open_data->color}}-params" style="float: right;">
                                <div class="col-md-12">
                                    <b>#{{ $Open_data->name }}</b>
                                </div>
                            </div>

                            @if(session('sort') == 'collect')
                                <a href="/open_channel/{{ $Open_data->name }}/{{ $Open_data->video_id }}" class="video-prev video-prev-small" style="margin-top: 35px;">
                                    <img  width="100%" height="100%" src='http://img.youtube.com/vi/{{ $Open_data->video_id }}/mqdefault.jpg'></a>
                            @endif
                            @if(session('sort') == 'likes')
                                <a href="/open_channel/{{ $Open_data->name }}/{{ $Open_data->video_id }}" class="video-prev video-prev-small" style="margin-top: 35px;">
                                    <img  width="100%" height="100%" src='http://img.youtube.com/vi/{{ $Open_data->video_id }}/mqdefault.jpg'></a>
                            @endif

                            <h3 class="video-title" >
                                <a href="/test3"> {{ $Open_data->title }}</a></h3>

                            @if(session('sort') == 'collect')

                                <form name="dislike" id="dislike" action="/channel/{{$Open_data->collect_video_id}}/discollect" method="post">
                                    <button class="btn btn-link" style="float: right;margin-bottom: 5px; padding: 0px 3px;"> <i class="fa fa-trash-o"></i>刪除收藏</button>
                                    {{-- CSRF 欄位--}}
                                    {{ csrf_field() }}
                                </form>

                            @endif

                            @if(session('sort') == 'likes')

                                <form name="dislike" id="dislike" action="/channel/{{$Open_data->like_video_id}}/dislike" method="post">
                                    <button class="btn btn-link" style="float: right;margin-bottom: 5px; padding: 0px 3px;"> <i class="fa fa-trash-o"></i>刪除喜愛</button>
                                    {{-- CSRF 欄位--}}
                                    {{ csrf_field() }}
                                </form>

                            @endif


                        </article>
                    @endforeach
                </div>


                <!-- Pagination -->

        </div>
        @endif
    </section>
@endsection

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script type="text/javascript" src="/layui/layui.js"></script>
