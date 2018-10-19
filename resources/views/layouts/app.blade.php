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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Bootstrap 4 --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    {{-- font and icons --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/skeleton.css')}}?v={{filemtime('css/skeleton.css')}}">
</head>
<body>
    @guest
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            
                                {{-- <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li> --}}
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')
        </div>
    @else
        <div class="page-wrapper chiller-theme toggled">
            <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                <i class="fas fa-bars"></i>
            </a>
            <nav id = "sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                    <div class="sidebar-brand">
                        <a href="#">Jewellary</a>
                        <div id="close-sidebar">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="sidebar-header">
                        <div class="user-pic">
                            <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/bootstrap4/assets/img/user.jpg" alt="profile pic">
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ Auth::user()->name }}</span>
                            <span class="user-role">Administrator</span>
                            <span class="user-status">
                                <i class="fa fa-circle"></i>
                                <span>Online</span>
                            </span>
                        </div>
                    </div>
                    <div class="sidebar-search">
                        <div>
                            <div class="input-group">
                                <input type="text" name="" class="form-control search-menu" placeholder="Search...">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-menu">
                        <ul>
                            <li class="header-menu">
                                <span>General</span>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-tachometer-alt"></i>
                                    <span><a href="/add-category">Category</a></span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="/category/add-subcategory">Subcategory
                                            </a>
                                        </li>
                                    </ul>
                                </div>   
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>E-Commerce</span>
                                    <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="#">Products
                                            </a>
                                            <a href="#">Orders  
                                            </a>
                                            <a href="#">Credit Card
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                </a>
                            </li>
                            <li class="header-menu"> 
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>        
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sidebar-footer">
                    <a href="#">
                        <i class="fa fa-bell">
                        </i>
                        <span class="badge badge-pill badge-warning notification">3</span>
                    </a>
                    <a href="#">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div>
            </nav>
            <main class="page-content">
                @yield('content')
            </main>
        </div>
    @endguest

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/skeleton.js') }}"></script>
    @yield('js')
    {{-- jQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- Bootstrap and Popper JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
