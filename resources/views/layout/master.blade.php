<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="utf-8" />
        <title>Learning - @yield('title')</title>

        <!-- CSS Files -->
        <link rel="stylesheet" href="/css/amazeui.min.css"/>
        <link rel="stylesheet" href="/plugin/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/plugin/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="/css/style.css"/>
        <link rel="stylesheet" href="/plugin/animate.min.css" />


        @yield('css_link')

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <header class="main">
            <div class="container">
                @include('layout.partial.navigation')
            </div>
        </header>

        <div class="page-header">
            <div class="container" >
                <div class="row">
                    <div class="col-md-7">
                        <h1>{{ $subject }}@yield('subscribe')</h1>
                    </div>

                    <div class="col-md-5">
                        <ol class="breadcrumb pull-right">
                            <li><a href="index.htm">Home </a></li>
                            <li class="active">{{ $title }}</li>
                        </ol>
                    </div>
                </div>
                @yield('category_well')
            </div>


        </div>


        @yield('content')


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

        <script src="/js/nav/amazeui.min.js"></script>
        <script src="/js/nav/app.js"></script>
    </body>
</html>