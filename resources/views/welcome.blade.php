<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Article Post</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .img-logo-post {
                width: 30%;
            }
            .logo-bar {
                widows: 100%;
                height: 100px;
                background-color: #fff;
            }
            .nav-link {
                font-size: 18px;
            }
        </style>
        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custome.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="logo-bar">
            <div class="container">
                {{-- <img class="img-logo-post" src="{{asset('images/guestpost.png')}}" alt="logo"> --}}
                <img src="https://ads.sabay.com/images/5046d3fa9915fa6cf090013c8d6b89aa.jpg" width="1000" height="75" alt="" title="" border="0">
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
            <div class="container">
            <a class="navbar-brand" href="{{url('all/articles')}}"><i class="fa fa-home"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="{{url('articles/entertainments')}}">Entertainments</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="{{url('articles/sports')}}">Sports</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('articles/technologies')}}">Technologies</a>
                </li>
                    <li class="nav-item active">
                    <a class="nav-link" href="{{url('articles/socials')}}">Socials</a>
                </li>
              </ul>
            </div>
            <form class="form-inline" action="/articles/search" method="POST" role="search">
                @csrf
                <input class="form-control mr-sm-2" type="search" name="title" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>

          </nav>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    {{-- @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else --}}
                        {{-- <a href="{{ route('login') }}">Login</a> --}}

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif --}}
                    {{-- @endauth --}}
                </div>
            @endif
        </div>
        <main class="py-4">
            @yield('content1')
        </main>
    </body>
</html>
