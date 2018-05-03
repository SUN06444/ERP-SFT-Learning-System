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

    </style>

    <style>
        .color-choose div {
            display: inline-block;
        }

        .color-choose input[type="radio"] {
            display: none;
        }

        .color-choose input[type="radio"] + label span {
            display: inline-block;
            width: 25px;
            height: 25px;
            margin: -1px 4px 0 0;
            vertical-align: middle;
            cursor: pointer;
            border-radius: 50%;
        }
        .color-choose input[type="radio"] + label span {
            border: 2px solid #FFFFFF;

        }
        .color-choose input[type="radio"]#cadetblue + label span {
            background-color: #5f9ea0;
        }
        .color-choose input[type="radio"]#coral + label span {
            background-color: #ff7f50;
        }
        .color-choose input[type="radio"]#palevioletred + label span {
            background-color: #db7093;
        }
        .color-choose input[type="radio"]#darkorange + label span {
            background-color: #ff8c00;
        }
        .color-choose input[type="radio"]#olivedrab + label span {
            background-color: #6b8e23;
        }

        .color-choose input[type="radio"]#dodgerblue + label span {
            background-color: #1e90ff;
        }
        .color-choose input[type="radio"]#royalblue + label span {
            background-color: #4169e1;
        }
        .color-choose input[type="radio"]#mediumspringgreen + label span {
            background-color: #00fa9a;
        }
        .color-choose input[type="radio"]#peru + label span {
            background-color: #cd853f;
        }
        .color-choose input[type="radio"]#darkorchid + label span {
            background-color: #9932cc;
        }

        .color-choose input[type="radio"]#cadetblue:checked + label span {
            box-shadow:  0 0 0 1px #5f9ea0;
        }
        .color-choose input[type="radio"]#coral:checked + label span{
            box-shadow:  0 0 0 1px #ff7f50;
        }
        .color-choose input[type="radio"]#palevioletred:checked + label span {
            box-shadow:  0 0 0 1px #db7093;
        }
        .color-choose input[type="radio"]#darkorange:checked + label span {
            box-shadow:  0 0 0 1px #ff8c00;
        }
        .color-choose input[type="radio"]#olivedrab:checked + label span {
            box-shadow:  0 0 0 1px #6b8e23;
        }

        .color-choose input[type="radio"]#dodgerblue:checked + label span {
            box-shadow:  0 0 0 1px #1e90ff;
        }
        .color-choose input[type="radio"]#royalblue:checked + label span{
            box-shadow:  0 0 0 1px #4169e1;
        }
        .color-choose input[type="radio"]#mediumspringgreen:checked + label span {
            box-shadow:  0 0 0 1px #00fa9a;
        }
        .color-choose input[type="radio"]#peru:checked + label span {
            box-shadow:  0 0 0 1px #cd853f;
        }
        .color-choose input[type="radio"]#darkorchid:checked + label span {
            box-shadow:  0 0 0 1px #9932cc;
        }
    </style>

    <script type="text/javascript" src="/js/jquery2.min.js"></script>
    <script type="text/javascript" src="/js/theme.js"></script>

    <script>
        jQuery(document).ready(function($) {
            $('.theme-login').click(function(){
                $('.theme-popover-mask').fadeIn(100);
                $('.theme-popover').slideDown(200);
            })
            $('.theme-poptit .close').click(function(){
                $('.theme-popover-mask').fadeOut(100);
                $('.theme-popover').slideUp(200);
            })

        })

        jQuery(document).ready(function($) {
            $('.theme-newlogin').click(function(){
                $('.theme-newpopover-mask').fadeIn(100);
                $('.theme-newpopover').slideDown(200);
            })
            $('.theme-newpoptit .close').click(function(){
                $('.theme-newpopover-mask').fadeOut(100);
                $('.theme-newpopover').slideUp(200);
            })

        })

    </script>

    @if($errors AND count($errors))
        <script>
            jQuery(document).ready(function($) {

                $('.theme-popover-mask').fadeIn(100);
                $('.theme-popover').slideDown(200);

                $('.theme-poptit .close').click(function(){
                    $('.theme-popover-mask').fadeOut(100);
                    $('.theme-popover').slideUp(200);
                    window.location.reload();
                })

            })
        </script>

    @endif


@endsection
@section('subscribe')

    @if(session()->has('user_id'))
        <div class="theme-newpopover-mask"></div>

        <div class="pull-right list-view-change">
            <a class="layui-btn theme-login"  style="padding: 5px 15px;background-color: #ff0000a6; color: #fff;"  href="javascript:;">
                <i class="layui-icon" style="vertical-align: unset;">&#xe654;</i>新增頻道</a>

            <div class="theme-popover">
                <div class="theme-poptit">
                    <a href="javascript:;" title="关闭" class="close">×</a>
                    <h3 style=" font-family: 微軟正黑體; font-weight: bold;    text-align: center;" >新增頻道</h3>
                </div>

                {{-- 錯誤訊息模板元件 --}}
                @include('components.validationErrorMessage')
                <div class="theme-popbod dform">

                    <form class="theme-signin" name="add_video" action="/open_channel/add" method="post" >
                        <ol>

                            <li style="padding-left:0px;">
                                <strong>頻道名稱：</strong>
                                <input class="ipt" type="text" name="openchannel_name"  placeholder="openchannel_name"/>
                            </li>
                            <li style="padding-left:0px;">
                                <strong>標籤顏色：</strong>
                                <div class="color-choose">
                                    <div>
                                        <input data-image="cadetblue" type="radio" id="cadetblue" name="channel_color" value="cadetblue" checked>
                                        <label for="cadetblue"><span></span></label>
                                    </div>
                                    <div>
                                        <input data-image="coral" type="radio" id="coral" name="channel_color" value="coral">
                                        <label for="coral"><span></span></label>
                                    </div>
                                    <div>
                                        <input data-image="palevioletred" type="radio" id="palevioletred" name="channel_color" value="palevioletred">
                                        <label for="palevioletred"><span></span></label>
                                    </div>
                                    <div>
                                        <input data-image="darkorange" type="radio" id="darkorange" name="channel_color" value="darkorange">
                                        <label for="darkorange"><span></span></label>
                                    </div>
                                    <div>
                                        <input data-image="olivedrab" type="radio" id="olivedrab" name="channel_color" value="olivedrab">
                                        <label for="olivedrab"><span></span></label>
                                    </div>

                                    <div>
                                        <input data-image="dodgerblue" type="radio" id="dodgerblue" name="channel_color" value="dodgerblue">
                                        <label for="dodgerblue"><span></span></label>
                                    </div>
                                    <div>
                                        <input data-image="royalblue" type="radio" id="royalblue" name="channel_color" value="royalblue">
                                        <label for="royalblue"><span></span></label>
                                    </div>
                                    <div>
                                        <input data-image="mediumspringgreen" type="radio" id="mediumspringgreen" name="channel_color" value="mediumspringgreen">
                                        <label for="mediumspringgreen"><span></span></label>
                                    </div>
                                    <div>
                                        <input data-image="peru" type="radio" id="peru" name="channel_color" value="peru">
                                        <label for="peru"><span></span></label>
                                    </div>
                                    <div>
                                        <input data-image="darkorchid" type="radio" id="darkorchid" name="channel_color" value="darkorchid">
                                        <label for="darkorchid"><span></span></label>
                                    </div>
                                </div>
                            </li>

                            <li style="padding-left:0px;">
                                <strong>內容描素：</strong>
                                <textarea class="form-control" name="description" rows="4"></textarea>
                            </li>



                            <input type="hidden" name="user_id" value="{{ session('user_id')}}">
                            <li style="padding-left:0px;margin-bottom: 1px;">
                                <input class="btn btn-primary" type="submit" name="submit" value=" 確認新增 " />
                            </li>

                        </ol>
                        {{-- CSRF 欄位--}}
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>


        </div>
    @endif


@endsection

@section('category_well')

    <div class="well" style="margin-top: 15px; margin-bottom: 1px;border: 5px solid #d3d3d3;">

        「開放式頻道」計劃旨在集合社會力量，創建一個共享教育的平台。
        「共享」的意思，就是希望可以透過平台，共同享用珍貴的教學資源。
        透過這個平台，讓每個人都有機會分享屬於自己的知識，並且不帶任何利益的社會交換，
        改變學生各自買教科書的傳統教學模式，並藉此作為推動並過渡至家長可負擔的電子學習模式。
        只要是有需求的教師就能上平台搜尋，並借用其他老師陳述觀點的影片進行遠距觀課或教學，而學生與家長也能按照個人進度補課或補充知識。


    </div>

@endsection

@section('content')



    <section class="content content-light  videos-list videos-list-grid">

        <div class="container">

            <div class="filter">

            </div>


            <hr class="invisible" />

            <div class="row" style="display: flex;flex-wrap: wrap;">
                @foreach($Get_openchannel_data as $openchannel_data)
                    <article class="col-md-4 video-item">

                        <a href="/open_channel/{{ $openchannel_data->name }}">
                            <img style="box-shadow: 0 0 10px 10px rgba(0, 0, 0, 0.88);
    border: 3px solid #d3d3d3;border-radius: 15px;" width="350px" height="245px" src='/img/channel.png'>
                        </a>

                        <h3 class="video-title" style="text-align:center;margin-top:15px;font-size: 20px;font-family: 微軟正黑體;">
                            <a style="color: teal;" href="/channel/{{ $openchannel_data->name }}">「 {{$openchannel_data->name}} 」</a>
                        </h3>

                    </article>
                @endforeach
            </div>

        </div>
    </section>

@endsection
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script type="text/javascript" src="/layui/layui.js"></script>


