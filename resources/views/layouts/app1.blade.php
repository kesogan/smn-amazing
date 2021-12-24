<!Doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE-edge"/>
	<title>Smndesign</title>

    <meta name="description" content="">
	<meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!--[if lt IE 9]>
	    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

    <link rel="shortcut icon" href="{{ asset('assets/icon/logo.ico') }}" type="image/x-icon" />

    <!-- **CSS - stylesheets** -->
	<link id="default-css" rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" media="all" />

    <!-- **Additional - stylesheets** -->
    <link href="{{ asset('assets/css/animations.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link id="shortcodes-css" href="{{ asset('assets/css/shortcodes.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link id="skin-css" href="{{ asset('assets/css/red_style.css') }}" rel="stylesheet" media="all" />
    <link href="{{ asset('assets/css/isotope.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('assets/css/prettyPhoto.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pace.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" type="text/css" media="all"/>

    <link id="light-dark-css" href="{{ asset('assets/css/dark.css') }}" rel="stylesheet" media="all" />

	<link id="light-dark-css" href="{{ asset('assets/css/index.css') }}" rel="stylesheet" media="all" />

    <!-- **Font Awesome** -->
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css" />

	<!-- Modernizr -->
    <script src="{{ asset('assets/js/modernizr.js') }}"></script>


    {{-- This will insert further style --}}
    @stack('style')
</head>

<body>
    <div class="loader-wrapper" style="height: ">
        <div id="large-header" class="large-header">
            <h1 class="loader-title"><span class="text-uppercase">MVE</span> Art</h1>
        </div>
    </div>
<!-- **Wrapper** -->

<div class="wrapper">
	<div class="inner-wrapper">
        @include('layouts.header')
        @yield('parallax')

        <div id="main">
            @yield('content')

            @include('layouts.footer1')
        </div><!-- Main Ends Here-->

	</div><!-- **inner-wrapper - End** -->
</div><!-- **Wrapper Ends** -->

<!-- **jQuery** -->
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" type="text/javascript"></script> --}}
	<script src="{{ asset('assets/js/jquery-1.11.2.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/js/jquery.inview.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.viewport.js') }}" type="text/javascript"></script>

    <script type="text/javascript" src="{{ asset('assets/js/jquery.isotope.min.js') }}"></script>

	<script src="{{ asset('assets/js/jsplugins.js') }}" type="text/javascript"></script>

	<script src="{{ asset('assets/js/jquery.prettyPhoto.js') }}" type="text/javascript"></script>

	<script src="{{ asset('assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/js/jquery.tipTip.minified.js') }}" type="text/javascript"></script>

    <script type="text/javascript" src="{{ asset('assets/js/jquery.bxslider.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap-notify.min.js') }}"></script>

    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script src="{{ asset('assets/js/index.js') }}"></script>

    @include('components.alert')

    {{-- This will insert further script JS --}}
    @stack('script')
</body>
</html>
