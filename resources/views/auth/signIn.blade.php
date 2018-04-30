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

        <div id="container" class="__signingin">
            <div class="col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3 animated fadeInDown" id="form">
                <div id="form-info" class="text-center">
                    <div key="login" v-if="state == '__signingin'">
                        <h1 style="font-weight: bold;">會 員 登 入</h1>
                        <p>立即登入，即可觀賞影片、共享知識 !</p>
                        <div class="form-group">
                            <a class="btn btn-link" @click.prevent="goToRegistration" href="/user/auth/sign-up">還尚未擁有帳號嗎?</a>
                        </div>
                    </div>
                </div>

                <div id="form-slider">
                    <div v-if="state == '__signingin'" class="animate fadeIn" key="login" id="login-form">
                        <form action="/user/auth/sign-in" method="post">
                            <div class="form-group">
                                <label for="email">信箱 :</label>
                                <input type="email" name="email" class="form-control" placeholder="E-mail"/>
                            </div>
                            <div class="form-group">
                                <label for="password">密碼 :</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg btn-block" >登 入</button>
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
    </div>

@endsection

