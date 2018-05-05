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

        <!--Start of Zendesk Chat Script-->
        <script type="text/javascript">
            window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
                d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
            _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
                $.src="https://v2.zopim.com/?5gEsfmcNE6Qnrw1cgSX53MzjdHeLyCLO";z.t=+new Date;$.
                    type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
        </script>
        <!--End of Zendesk Chat Script-->

        @include('layout.partial.footer')

        <script src="/script/script.js"></script>

        <!-- JavaScript Files -->
        <script src="/plugin/jquery-1.10.2.min.js"></script>
        <script src="/plugin/bootstrap/js/bootstrap.min.js"></script>
        <script src="/plugin/jquery.cuteTime.min.js"></script>

        <!-- / JavaScript Files -->

        <script src="/js/jquery.min.js"></script>
        <script type="text/javascript" src="/js/prettify/prettify.js"></script>
        <script src="/js/layout.js"></script>

        <script src="/js/nav/amazeui.min.js"></script>
        <script src="/js/nav/app.js"></script>
    </body>
</html>