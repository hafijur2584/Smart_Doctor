<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link rel="icon" type="image/png" href="{{ asset('user/images/5.png') }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Smart Online Doctor</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

    <!-- Font Awesome -->
    <link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
    @yield('doc_min')
    <link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css') }}">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('user/css/mdb.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    @yield('css_for_doctor_profile')
    <link href="{{ asset('user/css/responsive.css') }}" rel="stylesheet">



    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('user/js/jquery-3.3.1.min.js') }}"></script>
    {{--<script type="text/javascript" src="{{ asset('user/js/jquery.min.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('user/js/owl.carousel.js') }}"></script>
    {{--<script type="text/javascript" src="{{ asset('user/js/jquery-2.1.3.min.js') }}"></script>--}}
    @yield('js_for_search_disease')

</head>