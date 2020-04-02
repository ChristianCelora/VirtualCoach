<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form_buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main_content.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="bg-dark">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm main-top-navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav mr-auto">

                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                             <li class="nav-item">
                                 <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                             </li>
                            @endif
                        @else
                           <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle open" id="navbarDropdownLi" data-toggle="dropdown" href="#" role="button" aria-haspopup="true">
                                    <i class="fas fa-user"></i>
                                    {{ Auth::user()->name }}
                                    <i class="fas fa-caret-down" style="margin-left: 15px"></i>
                                    <i class="fas fa-caret-up" style="margin-left: 15px"></i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdownLi">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <div id="main-bg">
           <main class="main-content py-4 div-stretch">
              {{-- Alert Box --}}
              @if(Session::has("alert"))
                 @php $alert_data = Session::get("alert") @endphp
                 @if(isset($alert_data["message"]))
                    <div class="container">
                       <div class="alert custom-alert alert-dismissible fade show font-primary" role="alert">
                          {{$alert_data["message"]}}
                          <button type="button" class="close custom-close-btn font-black" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                       </div>
                    </div>
                 @endif
              @endisset
              {{-- Main content --}}
              @yield('content')
           </main>
        </div>


        <footer class="site-footer pt-4">
           <div class="container">
              <div class="row">
                 <div class="col-md-8 col-sm-6 col-xs-12 font-primary">
                    <p>Copyright &copy; 2020 All Rights Reserved by
                       <a href="#">Celo</a>.
                    </p>
                 </div>

                 <div class="col-md-4 col-sm-6 col-xs-12 font-primary">
                    <ul class="list-group list-group-horizontal justify-content-end">
                      <li class="px-2"><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                      <li class="px-2"><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                      <li class="px-2"><a class="dribbble" href="#"><i class="fab fa-dribbble"></i></a></li>
                      <li class="px-2"><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                 </div>
              </div>
           </div>
        </footer>
    </div>
</body>
</html>
