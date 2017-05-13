<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <meta name="robots" content="all,follow">
        <meta name="googlebot" content="index,follow,snippet,archive">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{config('bolivar-shop.name')}} - @yield('title')</title>

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>
        <!-- Bootstrap and Font Awesome css -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Theme stylesheet, if possible do not edit this stylesheet -->
        <link href="{{asset('theme/universal/css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">

        <!-- Responsivity for older IE -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and apple touch icons-->
        <link rel="shortcut icon" href="{{asset('theme/universal/img/favicon.ico')}}" type="image/x-icon" />
        <link rel="apple-touch-icon" href="{{asset('theme/universal/img/apple-touch-icon.png')}}" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{asset('theme/universal/img/apple-touch-icon-57x57.png')}}" />
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('theme/universal/img/apple-touch-icon-72x72.png')}}" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('theme/universal/img/apple-touch-icon-76x76.png')}}" />
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('theme/universal/img/apple-touch-icon-114x114.png')}}" />
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset('theme/universal/img/apple-touch-icon-120x120.png')}}" />
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset('theme/universal/img/apple-touch-icon-144x144.png')}}" />
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('theme/universal/img/apple-touch-icon-152x152.png')}}" />
    </head>
    <body>
    <div id="all">
        @include('partials.header')
        @yield('content')
        @include('partials.footer')
    </div><!--/all-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    @yield('script')
    </body>
</html>