<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VentaCatalogo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    #map {
	height: 500px;
	width: 100%;
}
    </style>
</head>
<body background="https://images.homedepot-static.com/productImages/d86162f3-e35d-49a0-bb98-1a630ea0cc77/svn/nude-behr-exterior-wood-stains-01101-31_1000.jpg">
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #B29573;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'VENTACATALOGO') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('categoriasF') }}" id="navbarDropdownMenuLink" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                CATEGORÍA
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('categoriasF') }}#Moda">Moda</a>
                                <a class="dropdown-item" href="{{ route('categoriasF') }}#Bioseguridad">Bioseguridad</a>
                                <a class="dropdown-item" href="{{ route('categoriasF') }}#Hogar">Hogar</a>
                                <a class="dropdown-item" href="{{ route('categoriasF') }}#Bisuteria">Bisúteria</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('social') }}" target="_blank"
                                id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                SOCIAL
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('social') }}#Tendencia">Tendecia</a>
                                <a class="dropdown-item" href="https://modaapplication.herokuapp.com/">MODA</a>
                            </div>
                        </li>
                    </ul>
                    
                        @auth
                            <ul class="navbar-nav mr-auto">
                                @if (Auth::user()->role_id=="1")
                                    <li class="nav-item">
                                        <a href="{{ route('realizarpedido') }}" class="nav-link">REALIZAR PEDIDO</a>
                                        
                                    </li>
                                @endif
                                @if (Auth::user()->role_id=="2")
                                <li class="nav-item">
                                    <a href="{{ route('verpedido') }}" class="nav-link">PEDIDOS</a>
                                </li>
                                @endif
                                @if (Auth::user()->role_id=="3")
                                <li class="nav-item">
                                    <a href="{{ url('/administrador') }}" class="nav-link">ADMINISTRADOR</a>
                                </li>
                                @endif

                        @endauth

                    </ul>

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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                            <img src="{{ Auth::user()->fotoperfil }}" alt="Logo" style="width:40px;">
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
