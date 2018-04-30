@extends('layout.master')

@section('title', $title)

@section('css_link')

    <link rel="stylesheet" type="text/css" href="/css/auth.css">
    <link rel="stylesheet" type="text/css" href="http:////netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

@endsection

@section('content')


    <div class="row" style="margin-top: 0.5%; margin-bottom: 8%;">

        {{-- 錯誤訊息模板元件 --}}
        @include('components.validationErrorMessage')

        <div id="container" class="__registration">
            <div class="col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3 animated fadeInDown" id="form">
                <div id="form-info" class="text-center">
                    <div key="register" v-if="state == '__registration'">
                        <h1 style="font-weight: bold;">會 員 註 冊</h1>
                        <p>歡迎加入我們的行列，讓我們一起分享知識吧 !</p>
                        <div class="form-group">
                            <a class="btn btn-link" @click.prevent="goToLogin" href="/user/auth/sign-in">已經擁有帳號了嗎?</a>
                        </div>
                    </div>
                </div>

                <div id="form-slider">
                    <form action="/user/auth/sign-up" method="post">
                        <div class="form-group">
                            <label for="nickname">暱稱 :</label>
                            <input type="text" name="nickname" class="form-control" placeholder="nickname"/>
                            <p></p>
                            <label for="email">信箱 :</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail"/>
                            <p></p>
                            <label for="password">密碼 :</label>
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                            <p></p>
                            <label for="password_confirmation">確認密碼 :</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password confirmation"/>

                            <input type="hidden" name="type" value="G">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg btn-block">註 冊</button>
                            <div class="or"></div>
                        </div>
                        <a href="/user/auth/facebook-sign-in" class="login-with-fb">
                            <span class="icon fa fa-facebook"></span>
                            使用  FACEBOOK  快速登入
                        </a>

                        {{-- CSRF 欄位--}}
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

