<!DOCTYPE html>

<html lang="pt-br">

<head><link rel="shortcut icon" href="{{ asset('img/roda.ico')}}" type="image/x-icon" />

<link rel="shortcut icon" href="{{ asset('img/roda.ico')}}" type="image/x-icon" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=10">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="">
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/basic.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/all.css')}}" />
    <title>Cars For You</title>
</head>

<body class="loaded">
    <div id="app" class="wrapper">
        <header class="header">
            <nav class="nav-main">
                <div class="container">
                    <div class="row header-holder">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <small>Menu</small>
                            </button>
                            <a class="navbar-brand"><img src="{{asset('/img/logo.png')}}" width="175" alt="" title="" class="img-responsive"></a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <ul data-nav-partner="false">
                                    <li><a href="/" ><span>Home</span></a></li>
                                    <li><a href="#" ><span>For you</span></a></li>
                                    <li><a href="#" ><span>Partnerships & Offers</span></a></li>
                                    <li><a href="#" ><span>Service</span></a></li>
                                    <li><a href="/rentals" ><span>My Bookings</span></a></li>
                                    @if (Route::has('login'))
                                    @auth
                                <li class="link-submenu link-submenu-costumer logged-out hidden-xs" style="display: block !important">
                                    <span class="link-login"><a href="#" id="welcome">Welcome
                                            {{Auth::user()->name}}</a></span> @if(Auth::user()->profile_id == 1)
                                    <span class="link-register">
                                        <a href="{{ url('/home') }}" id="access-personal-register-area">Dashboard</a>
                                    </span> @else
                                    <span class="link-register"><a href="/perfil" id="access-personal-register-area">My
                                            Profile</a></span> @endif
                                </li>
                                @else
                                <li class="link-submenu link-submenu-costumer logged-out hidden-xs" style="display: block !important">
                                    <span class="link-login"><a href="{{ route('login') }}"
                                            id="access-your-dashboard">Login</a></span> @if (Route::has('register'))
                                    <span class="link-register"><a href="{{ route('register') }}"
                                            id="access-personal-register-area">Cadastre-se</a></span> @endif
                                </li>
                                @endauth
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </nav>
        </header>
    </div>
    <main id="main-content">
        <div id="partial-groups">
            <div class="bg-blue-gradient--internal">
                <div class="bg-blue-gradient__inner">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h1 class="main-headline headline--my-reservations">
                                    <span>My Reservations</span>
                                    <small class="headline--subtitle">Here you can find some options
                                    available for you...</small>
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                        INSERT CONTENT HERE
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
            <div class="footer__inner--copyright">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <p>Car Rental System </p>
                                <br>© 2021
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
