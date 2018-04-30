<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Learning - @yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS Files -->
    <link rel="stylesheet" href="/plugin/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/plugin/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/css/style.css"/>
    <link rel="stylesheet" href="/plugin/animate.min.css" />
    <link rel="stylesheet" href="/css/background/index.css" />

@yield('css_link')

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="/js/background/index.js"></script>
</head>

<body>
<header class="main">
    <div class="container">
        @include('layout.partial.navigation')
    </div>
</header>

<section class="slider-full-width">
    <div id="carousel-full" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-full" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-full" data-slide-to="1"></li>

        </ol>

        <!-- Wrapper for slides -->

        <div class="carousel-inner">
            <div class="item active">
                <!--
                                 <main>
                                     <div class="video-wrap">
                                         <div id="player"></div>
                                     </div>
                                 </main>
                  -->

                              <img src="https://wallpaperscraft.com/image/book_flower_bookmark_page_97250_3840x2160.jpg" alt="" />

                               <div class="container">
                                   <div class="carousel-caption" style="color: #080808;font-weight: bolder;">
                                       <p class="header animated" data-animation="fadeInUp" data-animation-delay="0.2s" style="font-style:oblique;">&nbsp;『學習的目的在於享受過程 ~』</p>
                                       <p class="header header-small animated" data-animation="fadeInUp" data-animation-delay="0.8s">&nbsp;&nbsp;何謂 ERP ? 何謂 SFT ?<br/>&nbsp;&nbsp;讓我們一同走進工業4.0的新思維</p>
                                       <p class="buttons animated" data-animation="fadeIn" data-animation-delay="1.6s">
                                           &nbsp;&nbsp;<a href="plans.htm" class="btn btn-theme btn-orange">開 始 學 習</a>
                                           &nbsp;&nbsp;<a href="video.htm" class="btn btn-theme btn-green"><i class="fa fa-play"></i>看 影 片</a>
                                       </p>
                                   </div>
                               </div>

                           </div>

                          <div class="item">
                              <img src="https://wallpaperscraft.com/image/road_highway_markings_67506_1366x768.jpg" alt="" />
                              <div class="container">
                                  <div class="carousel-caption" style="color: #080808;">
                                      <p class="header animated" data-animation="fadeInUp" data-animation-delay="0.2s" style="font-style:oblique;"><strong></strong>『如何邁向製程自動化 ??』</p>
                                      <p class="header header-small animated" data-animation="fadeInUp" data-animation-delay="0.8s"> 只擁有ERP這台汽車是不夠的<br/>您還得搭配 SFT 這個導航<br/><strong>它能帶你到想去的地方</strong></p>
                                      <p class="buttons animated" data-animation="fadeIn" data-animation-delay="1.6s">
                                          <a href="plans.htm" class="btn btn-theme btn-orange">Get started</a>
                                          <a href="plans.htm" class="btn btn-theme btn-green"><i class="fa fa-play"></i> See pricing</a>
                                      </p>
                                  </div>
                              </div>

             </div>
         </div>


                       <!-- Controls -->
        <a class="left carousel-control" href="#carousel-full" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-full" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</section>
<style>
    .text-center{
        font-size: 24px;
        text-align: left;
        margin-top: 30px;
    }
    .video-title, .openchannelvideo-title{
        margin-bottom: 15px;
    }

</style>

<section class="content content-light">
    <div class="container">
        <p class="text-center">
            <strong>[官方頻道] 最新影片</strong>
            </p>


        <div class="tab-content">
            <div id="tab-register" class="tab-pane fade in active">
                <p class="header text-center"></p>
            </div>
        </div>



        <div class="row" style="display: flex;flex-wrap: wrap;">
            @foreach($Get_Official_new as $official_new)
                <article class="col-md-4 video-item">

                    <a href="/official_channel/{{ $official_new->name }}/{{ $official_new->id }}" class="video-prev video-prev-small">
                        <img  width="100%" height="100%" src='http://img.youtube.com/vi/{{ $official_new->video_id }}/mqdefault.jpg'>
                    </a>

                    <h3 class="video-title">
                        <a href="/official_channel/{{ $official_new->name }}/{{ $official_new->id }}"> {{ $official_new->title }}</a>
                    </h3>


                    <div class="row video-params">
                        <div class="col-md-8">
                            <div class="row video-{{$official_new->color}}-params">
                                <div class="col-md-12">
                                    <b>#{{ $official_new->name }}</b>
                                </div>
                            </div>
                        </div>
                    </div>

                </article>
            @endforeach
        </div>

<hr style="border-top: 2px solid #ccc;">

        <p class="text-center"><strong>[官方頻道] Top3熱門影片</strong></p>
        <div class="row" style="display: flex;flex-wrap: wrap;">
            @foreach($Get_Official_hot as $official_hot)
                <article class="col-md-4 video-item">

                    <a href="/official_channel/{{ $official_hot->name }}/{{ $official_hot->id }}" class="video-prev video-prev-small">
                        <img  width="100%" height="100%" src='http://img.youtube.com/vi/{{ $official_hot->video_id }}/mqdefault.jpg'>
                    </a>

                    <h3 class="video-title">
                        <a href="/official_channel/{{ $official_hot->name }}/{{ $official_hot->id }}"> {{ $official_hot->title }}</a>
                    </h3>

                    <div class="row video-{{$official_hot->color}}-params">
                        <div class="col-md-12">
                            <b>#{{ $official_hot->name }}</b>
                        </div>
                    </div>

                </article>
            @endforeach
        </div>


    </div>
    <br>
</section>

<section class="content content-dark">
    <div class="container">

        <p class="text-center">
            
            <strong>[開放式頻道] 最新影片</strong>

        </p>

        <div class="tab-content">
            <div id="tab-register" class="tab-pane fade in active">
                <p class="header text-center">
            </div>
        </div>



        <div class="row" style="display: flex;flex-wrap: wrap;">
            @foreach($Get_Open_new as $open_new)
                <article class="col-md-4 video-item">

                    <a href="/official_channel/{{ $open_new->name }}/{{ $open_new->id }}" class="video-prev video-prev-small">
                        <img  width="100%" height="100%" src='http://img.youtube.com/vi/{{ $open_new->video_id }}/mqdefault.jpg'>
                    </a>

                    <h3 class="openchannelvideo-title">
                        <a href="/official_channel/{{ $open_new->name }}/{{ $open_new->id }}"> {{ $open_new->title }}</a>
                    </h3>

                    <div class="row video-params">
                        <div class="col-md-8">
                            <div class="row video-{{$open_new->color}}-params">
                                <div class="col-md-12">
                                    <b>#{{ $open_new->name }}</b>
                                </div>
                            </div>
                        </div>
                    </div>


                </article>
            @endforeach
        </div>
        <hr>
        <p class="text-center"><strong>[開放式頻道] Top3熱門影片</strong></p>
        <!-- Reel - number rotator -->
        <div class="row" style="display: flex;flex-wrap: wrap;">
            @foreach($Get_Open_hot as $open_hot)
                <article class="col-md-4 video-item">

                    <a href="/official_channel/{{ $open_hot->name }}/{{ $open_hot->id }}" class="video-prev video-prev-small">
                        <img  width="100%" height="100%" src='http://img.youtube.com/vi/{{ $open_hot->video_id }}/mqdefault.jpg'>
                    </a>

                    <h3 class="openchannelvideo-title">
                        <a href="/official_channel/{{ $open_hot->name }}/{{ $open_hot->id }}"> {{ $open_hot->title }}</a>
                    </h3>


                    <div class="row video-{{$open_hot->color}}-params">
                        <div class="col-md-12">
                            <b>#{{ $open_hot->name }}</b>
                        </div>
                    </div>

                </article>
            @endforeach
        </div>

    </div>
    <br>
</section>

<section class="content content-light">
    <div class="container">
        <p class="header text-white">


        <br>
        <a href="register.htm" class="btn btn-theme btn-green">查看更多熱門影片</a>

    </div>
    <br>
</section>



@include('layout.partial.footer')

    <!-- JavaScript Files -->
    <script src="/plugin/jquery-1.10.2.min.js"></script>
    <script src="/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/plugin/jquery.cuteTime.min.js"></script>
    <script src="/script/script.js"></script>
    <!-- / JavaScript Files -->

    <script src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/prettify/prettify.js"></script>
    <script src="https://cdn.bootcss.com/prettify/r298/run_prettify.js"></script>
    <script src="/js/layout.js"></script>
</body>
</html>