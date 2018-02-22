<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel='stylesheet' id='contact-form-7-css'  href="{{ asset('wp-content/plugins/contact-form-7/includes/css/styles4906.css?ver=4.7') }}" type='text/css' media='all' />
	<link rel='stylesheet' id='reset-css'  href="{{ asset('wp-content/themes/bhd/assets/css/reset125b.css?ver=4.7.4') }}" type='text/css' media='all' />
	<link rel='stylesheet' id='fonts-css'  href="{{ asset('wp-content/themes/bhd/assets/fonts/font125b.css?ver=4.7.4') }}" type='text/css' media='all' />
	<link rel='stylesheet' id='select2-css'  href="{{ asset('wp-content/themes/bhd/assets/css/select2.min7f0f.css?ver=2.5') }}" type='text/css' media='all' />
	<link rel='stylesheet' id='awesome-css'  href="{{ asset('wp-content/themes/bhd/assets/css/font-awesome.min125b.css?ver=4.7.4') }}" type='text/css' media='all' />
	<link rel='stylesheet' id='bootstrap-css'  href="{{ asset('wp-content/themes/bhd/assets/plugin/bootstrap-3.3.6-dist/css/bootstrap.min125b.css?ver=4.7.4') }}" type='text/css' media='all' />
	<link rel='stylesheet' id='loading-core-css'  href="{{ asset('wp-content/themes/bhd/lib_frontend/css/loading125b.css?ver=4.7.4') }}" type='text/css' media='all' />
	<link rel='stylesheet' id='mCustomScrollbar-core-css'  href="{{ asset('wp-content/themes/bhd/assets/css/jquery.mCustomScrollbar.min125b.css?ver=4.7.4') }}" type='text/css' media='all' />
	<link rel='stylesheet' id='style-core-css'  href="{{ asset('wp-content/themes/bhd/assets/css/style3dd0.css?ver=1514297339') }}" type='text/css' media='all' />
	<link rel='stylesheet' id='style-core-custom-css'  href="{{ asset('wp-content/themes/bhd/lib_frontend/css/style5fba.css?ver=5.2') }}" type='text/css' media='all' />
	<link rel='stylesheet' id='magnific-popup-css'  href="{{ asset('wp-content/themes/bhd/lib_frontend/css/magnific-popup125b.css?ver=4.7.4') }}" type='text/css' media='all' />
	<link rel='stylesheet' id='style-css'  href="{{ asset('wp-content/themes/bhd/style5917.css?t=1514297339&amp;ver=5.57') }}" type='text/css' media='all' />
	<link rel='stylesheet' id='style_v3-css'  href="{{ asset('wp-content/themes/bhd/v3/style_v35fba.css?ver=5.2') }}" type='text/css' media='all' />
</head>
<body class="home blog">
    <div id="wrapper">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </div>
    <div id="toTop">{{ trans('message.top') }}</div>
        <div id="home-popup-image" class="white-popup-block hidden">
        <a href="#"><img alt="" src="#" ></a>
    </div>
            

    <!-- Scripts -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4')}}"></script>
    <script src="{{asset('wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1')}}"></script>
    <script src="{{asset('wp-content/plugins/contact-form-7/includes/js/jquery.form.mind03d.js?ver=3.51.0-2014.06.20')}}"></script>
    <script src="{{asset('wp-content/plugins/contact-form-7/includes/js/scripts4906.js?ver=4.7')}}"></script>
    <script src="{{asset('wp-content/themes/bhd/assets/scripts/jquery.scrollTo-min5152.js?ver=1.0')}}"></script>
    <script src="{{asset('wp-content/themes/bhd/assets/scripts/jquery.flexslider-min5152.js?ver=1.0')}}"></script>
    <script src="{{asset('wp-content/themes/bhd/assets/scripts/select2.min5152.js?ver=1.0')}}"></script>
    <script src="{{asset('wp-content/themes/bhd/assets/plugin/bootstrap-3.3.6-dist/js/bootstrap.min5152.js?ver=1.0')}}"></script>
    <script src="{{asset('wp-content/themes/bhd/assets/scripts/jquery.mCustomScrollbar.min5152.js?ver=1.0')}}"></script>
    <script src="{{asset('wp-content/themes/bhd/assets/scripts/isotope.pkgd.min5152.js?ver=1.0')}}"></script>
    <script src="{{asset('wp-content/themes/bhd/lib_frontend/js/jquery.magnific-popup.min5152.js?ver=1.0')}}"></script>
    <script src="{{asset('wp-content/themes/bhd/assets/scripts/main5152.js?ver=1.0')}}"></script>
    <script src="{{asset('wp-includes/js/wp-embed.min125b.js?ver=4.7.4')}}"></script>

</body>
</html>
