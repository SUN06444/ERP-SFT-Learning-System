<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Learning - @yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="/css/accordions.css">
    <link rel="stylesheet" href="/css/style.css"/>

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.1.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/velocity-animate@1.5.0/velocity.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.ui.min.js" type="text/javascript" charset="utf-8" async defer></script>

    <script src="/js/accordions.js" type="text/javascript" charset="utf-8" async defer></script>
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

    </div>
</div>

<div class="wrapper" style="border-radius: 35px;
    border: 3px solid #333;
        margin: 20px 13%;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHJSURBVGhDYxgFo2AUjIJRMApGwXAHITlVpcG5lTMHIwa5DepMwgCo4XBIXtX/wYhBboM6kzCAeaRs8tL/LYu3DQoMcgvZHpm79+r/3fd+DwoMcsuoR0a0Rzbf+gXG2OQowXT3yPzz3/9r9z//X7n70/8dd7GrIQcPiEfkOp6CsdnUF/+7Dn3Bqo5UPKAegWHnOa/+zzz9Dat6YvGg8AgIywNx0NK3/5de+oFVHyE8aDwCw4pdz/4nrX33f92Nn1j148KDziMw7Dbv9f9tt4kv3QadRwwmvfjfcuDz/10klmiDxiMavc//l27/SFIsIOMB9wgoT6Ssf09ynkDHA+YRUCkVugxYSl0mr5RCxwPiEVdgRqa03kDHdPcINZslyJjuHqEVHvXIsPJIevOk/wU9cwYFBrmFbI8MRkySR0LyK/xC86rSyMH+mWVlHnGZh/BhkBpseonBILdBnUlb4ByVqusalfIfHwapgSofvGDIecQ5IsnQNTKl1CUypRwZO0ektLhGJR/Ah0Fq0PWBzAKZCTWePsA9OkndJTL5K7bQpgSDzHQOT1GDWkN74Byd7AC0dCZtcKo91JpRMApGwSgYBaNgFIxQwMAAAPqvjO5Mb0N9AAAAAElFTkSuQmCC"> 影片播放問題</h3>
                <div class="accordion panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading waves-effect">
                            <a href="#" class="accordion-link active" aria-expanded="true">
                                <h4 class="panel-title">Q1. 該如何加入會員呢？</h4>
                                <i class="material-icons accordion-toggle-icon">arrow_downward</i>
                            </a>
                        </div>
                        <div class="content-collapse" aria-expanded="true">
                            <div class="panel-body">
                                <p>
                                    Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile first projects on the web.
                                </p>
                                <p>
                                    Bootstrap makes front-end web development faster and easier. It's made for folks of all skill levels, devices of all shapes, and projects of all sizes.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading waves-effect">
                            <a href="#" class="accordion-link">
                                <h4 class="panel-title">Q2. 訂閱與取消頻道追蹤</h4>
                                <i class="material-icons accordion-toggle-icon">arrow_downward</i>
                            </a>
                        </div>
                        <div class="content-collapse collapsed">
                            <div class="panel-body">
                                <p>
                                    Velocity is an animation engine with the same API as jQuery's $.animate(). It works with and without jQuery. It's incredibly fast, and it features color animation, transforms, loops, easings, SVG support, and scrolling. It is the best of jQuery and CSS
                                    transitions combined.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAJQSURBVGhD7dlPiE1xGMbxKw2ljJ2sLCjMYpJsKAl7zYadho2p2diILNiJpGwUKxaksBiUlYUmoWTGAksLCyWUiCiE76PUdHr7/Tv3PecszlOfzdTvvefpnvmdP3fQp0+foizCAczhB/607BNuYAOSoxKXYA1s21fsQlL0TVhDuuI9RhHNPKwBXXIQwei06sL/RMxFBLMC1sKuuYZgPIp8wffK3+pqpMhrnMBGaN7/rMVJ/IK1Lod7kbMYQSh7cAt1CrkWiQ6vZAt0obNmxbgV+YaVyM00rHkxbkXuoiRLoc3AmhniVuQYSvMI1swQtyLRK20g+jatmSFuRXR/VppOFTmK0jyFNTPErch5lGQxPsOaGeJW5AlKshnWvBi3InpGKEnnriNHUJLl0MXUmhniVuQwSvMB1swQtyK6CSzJGKx5MW5FfiP36r4aD2HNi3ErIj+xDKk5DmtOCtciMonUPIY1I4V7kReIPVgpW2GtT+VeRM4hFH3GS1hrUzVS5DlCGYe1LkcjRfSCL5R1sNblaKTIfYSibddal6ORInrlE4q26Hew1qZyL3IFSxDLNryBNSOFW5EH2I2c6LNOofV7Lb0GvYxNqBO9SdmPnCfFoRTRjy2nsQrDzg7cg/W5C9UuMos18M4+fIR1DBItoh3FWijXoWfspqLfC/XkaR2LNpVo3qK68BVy7myHlQlUj0ViW/y/XEV14RTayjNUj0fbdzTrUX1Lfgh7W3IHC49lBsnZjjoXLC+3kX2K6w2HTqkLuNki7VBnsBN9+vQpymDwF7gkyRLmD9YOAAAAAElFTkSuQmCC"> 個人帳號</h3>
                <div class="accordion panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading waves-effect">
                            <a href="#" class="accordion-link active" aria-expanded="true">
                                <h4 class="panel-title">Q1. 該如何加入會員呢？？</h4>
                                <i class="material-icons accordion-toggle-icon">arrow_downward</i>
                            </a>
                        </div>
                        <div class="content-collapse" aria-expanded="true">
                            <div class="panel-body">
                                <p>
                                    Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile first projects on the web.
                                </p>
                                <p>
                                    Bootstrap makes front-end web development faster and easier. It's made for folks of all skill levels, devices of all shapes, and projects of all sizes.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading waves-effect">
                            <a href="#" class="accordion-link">
                                <h4 class="panel-title">Q2. 訂閱與取消頻道追蹤</h4>
                                <i class="material-icons accordion-toggle-icon">arrow_downward</i>
                            </a>
                        </div>
                        <div class="content-collapse collapsed">
                            <div class="panel-body">
                                <p>
                                    Velocity is an animation engine with the same API as jQuery's $.animate(). It works with and without jQuery. It's incredibly fast, and it features color animation, transforms, loops, easings, SVG support, and scrolling. It is the best of jQuery and CSS
                                    transitions combined.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><img src="data:image/png;base64,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"> 回報錯誤</h3>
                <div class="accordion panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading waves-effect">
                            <a href="#" class="accordion-link active" aria-expanded="true">
                                <h4 class="panel-title">Q1. 該如何加入會員呢？</h4>
                                <i class="material-icons accordion-toggle-icon">arrow_downward</i>
                            </a>
                        </div>
                        <div class="content-collapse" aria-expanded="true">
                            <div class="panel-body">
                                <p>
                                    Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile first projects on the web.
                                </p>
                                <p>
                                    Bootstrap makes front-end web development faster and easier. It's made for folks of all skill levels, devices of all shapes, and projects of all sizes.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading waves-effect">
                            <a href="#" class="accordion-link">
                                <h4 class="panel-title">Q2. 訂閱與取消頻道追蹤</h4>
                                <i class="material-icons accordion-toggle-icon">arrow_downward</i>
                            </a>
                        </div>
                        <div class="content-collapse collapsed">
                            <div class="panel-body">
                                <p>
                                    Velocity is an animation engine with the same API as jQuery's $.animate(). It works with and without jQuery. It's incredibly fast, and it features color animation, transforms, loops, easings, SVG support, and scrolling. It is the best of jQuery and CSS
                                    transitions combined.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANFSURBVGhD7VlLaxNRFM7at/gourBJKBW7UP+IG7UoFlxr6y9wq7UBF1LsjI1WRBRRu9KN4Mbooo1WqktFcWnqgya5N1aLTcdzJie0Tc4kc2funQSZDz4Ybs7jO3Pv3FcSMWLEiA5pW+5N2XIwacnRpC2n4fll0hZvkfCcwzb8LTUhTqItuXUHeq8Vd6RuyAtJS8ylLLEKgh1frNnm0RdjULjo4RZgywy8YbFBYABCT5WxpyIvKGlVzkLy75yoMIReXYAeGqI05nBw6sdWSHafE6GTmGNg4tsWSqsXqVuyB8b1PJfYBN0JAnJSej3oGxd7YCh95BKaJObE3CQjHHA4QU+85xJFQRhmc1qGGXTxAy5BlAQN90hOMODsxAXuCIPOZgfs0s6wU+zATemce/bb5SF45mz8EqfmQOsMOGcag6nwyO2K87lYder4tFh1Dk9VWFu/hBd7heT5A1YedsXOzC5TCWsYm1lmbf0SNJWUegX3P1wgFU7ONxeCbZytEi0xTDLbAyp/zQZR4LHpX87KKlUAWIFRhm2crRItOUsyW8PdiqvsYltw6OmS8/zLX5dnniyxNuoU1f6s2E1yvQHGg83O3UZxguR6A2cG3rl7CBovk1xvgOHjRscghCHqHIUpeD2xjbNVp3hIcr0BH/or3lmNuGY0Iuw6so45kusNqPYd46hMo4XAcYLkekPXmaPjhfxHQ0vPx262EH8f+yjvrEajhVjyEsn1BhhqWRAN90j7BRHPyDq2KOYKEdX918u7SG5rgEO+OYAajRViyRmS2R7gMNIUQJEGe+Q8yWwP92BlyzIfyB8NFVJUPu7C7DXGBPLN/knpXMz92UBs42z90tdmsRG1465Y4AJ2hqLQN/5zG8lTA17B8EGjJ4yQUyQrGPByjAscLcVdkhMceF0JxbzhE0TC/L6ss4nkhEOnLrFhzfig7RK7Drzid6/6uYQGiKNAexF1uMMsgj96gHd6rhY2U1pzqM1mosAICEdLfO215WlKEw3oWhX/hg61A0BCnBJuzdPZxe0UPnpgQSBmBDdzuDNtFOlNsEUfSwx3tAAOeAOYtsRxfLsg8BHwBU4Q7iQBz7U2ePNg43srHiNGDA1IJP4ByIr7WQKNxTcAAAAASUVORK5CYII="> 其他</h3>
                <div class="accordion panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading waves-effect">
                            <a href="#" class="accordion-link active" aria-expanded="true">
                                <h4 class="panel-title">Q1. 該如何加入會員呢？</h4>
                                <i class="material-icons accordion-toggle-icon">arrow_downward</i>
                            </a>
                        </div>
                        <div class="content-collapse" aria-expanded="true">
                            <div class="panel-body">
                                <p>
                                    Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile first projects on the web.
                                </p>
                                <p>
                                    Bootstrap makes front-end web development faster and easier. It's made for folks of all skill levels, devices of all shapes, and projects of all sizes.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading waves-effect">
                            <a href="#" class="accordion-link">
                                <h4 class="panel-title">Q2. 訂閱與取消頻道追蹤</h4>
                                <i class="material-icons accordion-toggle-icon">arrow_downward</i>
                            </a>
                        </div>
                        <div class="content-collapse collapsed">
                            <div class="panel-body">
                                <p>
                                    Velocity is an animation engine with the same API as jQuery's $.animate(). It works with and without jQuery. It's incredibly fast, and it features color animation, transforms, loops, easings, SVG support, and scrolling. It is the best of jQuery and CSS
                                    transitions combined.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@include('layout.partial.footer')
</body>
</html>