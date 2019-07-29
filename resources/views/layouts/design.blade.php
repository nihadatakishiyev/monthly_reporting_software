<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--    <link href="{{ asset('js/materialize.min.js') }}" rel="stylesheet">--}}
    <script src="{{ asset('js/materialize.min.js') }}" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{--    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>--}}
    {{--<link href="{{ asset('css/font-awesome.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>--}}
    <link href="{{ asset('css/style2.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script type = "text/javascript"src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
{{--    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>--}}
    <style>
        .activem{
            background-color: #F2F2F2;
        }
    </style>
</head>
<body>
<div class="navbar-fixed" style="z-index: 9999">
    <nav class="white">
        <div style="padding-left: 30px; padding-right: 30px">
            <div class="nav-wrapper">
                <a class="btn-floating btn-small waves-effect waves-light  dropdown-trigger hide-on-large-only" href='#' data-target='dropdown1'><i class="material-icons">arrow_drop_down_circle</i></a>
                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                    <li class="{{request()->segment(count(request()->segments())-1)=="user" ? "activem": ""}}"><a href="/user/{{\Illuminate\Support\Facades\Auth::id()}}">Profile</a></li>
                    @if(\Illuminate\Support\Facades\Auth::id()==1)
                        <li class="{{request()->segment(count(request()->segments())-1)=="dashboard" ? "activem": ""}}"><a href="/dashboard">Dashboard</a></li>
                    @endif
                    <li><a href="/logout">Logout</a></li>
                </ul>

                <a id="logo-container" href="/" class="brand-logo black-text"><b>Reporting</b></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="{{request()->segment(count(request()->segments())-1)=="user" ? "activem": ""}}"><a href="/users/{{\Illuminate\Support\Facades\Auth::id()}}">Profile</a></li>
                    <li class="{{request()->segment(count(request()->segments()))=="dashboard" ? "activem": ""}}"><a href="/dashboard">Dashboard</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>

            </div>

        </div>
    </nav>
</div>
<div>
    @yield('content')
</div>
{{--<script src="{{ asset('js/materialize.min.js') }}" defer></script>--}}
{{--<script src=" https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>--}}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
    // M.AutoInit();
    // document.addEventListener('DOMContentLoaded', function() {
    //     var elems = document.querySelectorAll('.modal');
    //     var instances = M.Modal.init(elems, options);
    // });
</script>
</body>
</html>
