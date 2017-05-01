<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Smart Store</title>
    <!-- <link href='../../../../https@fonts.googleapis.com/css@family=Open+Sans_3A400,300,700' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" type="text/css" href="{{ASSETS_PATH}}css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ASSETS_PATH}}css/font-linearicons.css"/>
    <link rel="stylesheet" type="text/css" href="{{ASSETS_PATH}}css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="{{ASSETS_PATH}}css/bootstrap-theme.css"/>
    <link rel="stylesheet" type="text/css" href="{{ASSETS_PATH}}css/jquery.fancybox.css"/>
    <link rel="stylesheet" type="text/css" href="{{ASSETS_PATH}}css/jquery-ui.css"/>
    <link rel="stylesheet" type="text/css" href="{{ASSETS_PATH}}css/owl.carousel.css"/>
    <link rel="stylesheet" type="text/css" href="{{ASSETS_PATH}}css/owl.transitions.css"/>
    <link rel="stylesheet" type="text/css" href="{{ASSETS_PATH}}css/owl.theme.css"/>
    <link rel="stylesheet" type="text/css" href="{{ASSETS_PATH}}js/slideshow/settings.css"/>
    <link rel="stylesheet" type="text/css" href="{{ASSETS_PATH}}css/theme.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{ASSETS_PATH}}css/responsive.css" media="all"/>

    <script type="text/javascript" src="{{ASSETS_PATH}}js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="{{ASSETS_PATH}}js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ASSETS_PATH}}js/jquery.fancybox.js"></script>
<script type="text/javascript" src="{{ASSETS_PATH}}js/jquery-ui.js"></script>
<script type="text/javascript" src="{{ASSETS_PATH}}js/owl.carousel.js"></script>
<script type="text/javascript" src="{{ASSETS_PATH}}js/jquery.jcarousellite.min.js"></script>
<script type="text/javascript" src="{{ASSETS_PATH}}js/jquery.elevatezoom.js"></script>
<script type="text/javascript" src="{{ASSETS_PATH}}js/TimeCircles.js"></script>
<script type="text/javascript" src="{{ASSETS_PATH}}js/slideshow/jquery.themepunch.revolution.js"></script>
<script type="text/javascript" src="{{ASSETS_PATH}}js/slideshow/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="{{ASSETS_PATH}}js/jquery.appear.js"></script>
<script type="text/javascript" src="{{ASSETS_PATH}}js/theme.js"></script>

</head>
<body>

<body>
    <div class="wrap">
        <!-- Start Header -->
        <div id="header">
            @include('layouts.frontend.partials.header')
        </div>
        <!-- End Header -->

        <!-- Start Content -->
        <div id="content">
            @include('layouts.frontend.partials.tab-sidebar')
            @yield('content')
        </div>
        <!-- End Content -->

        <!-- Start Footer -->
        <div id="footer">
            @include('layouts.frontend.partials.footer')
        </div>
        <!-- End Footer -->

    </div>
    
</body>

</html>
