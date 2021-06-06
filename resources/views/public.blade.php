<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <!-- <link rel="shortcut icon" href="{{ asset('img/roda.ico')}}" type="image/x-icon" /> -->
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
                                <a class="navbar-brand">Cars For You</a>
                            </div>
                            <div class="collapse navbar-collapse" id="navbar-collapse">
                                <ul data-nav-partner="false">
                                    <li><a href="/" ><span>Cars For You</span></a></li>
                                    <li><a href="/" ><span>Home</span></a></li>
                                    <!-- <li><a href="#" ><span>For you</span></a></li>
                                    <li><a href="#" ><span>Partnerships & Offers</span></a></li>
                                    <li><a href="#" ><span>Service</span></a></li> -->
                                    <li><a href="/rentals" ><span>My Bookings</span></a></li>
                                    @if (Route::has('login'))
                                    @auth
                                    <li class="link-submenu link-submenu-costumer logged-out hidden-xs" style="display: block !important">
                                        <span class="link-login"><a href="#" id="welcome">Welcome {{Auth::user()->name}}</a></span>
                                        @if(Auth::user()->profile_id == 1)
                                        <span class="link-register">
                                            <a href="{{ url('/home') }}" id="access-personal-register-area">Dashboard</a>
                                        </span>
                                        @else
                                        <span class="link-register"><a href="/rentals" id="access-personal-register-area">My Bookings</a></span>
                                        @endif
                                    </li>
                                    @else
                                    <li class="link-submenu link-submenu-costumer logged-out hidden-xs" style="display: block !important">
                                        <span class="link-login"><a href="{{ route('login') }}" id="access-your-dashboard">Login</a></span>
                                        @if (Route::has('register'))
                                        <span class="link-register"><a href="{{ route('register') }}" id="access-personal-register-area">Register</a></span>
                                        @endif
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
                            <div class="row m-t-sm-0 m-t-md-50" id="wrapper-headline">
                                <div class="col-lg col-12">
                                    <h1 class="main-headline"><span>Please Select a Vehicle to Rent</span></h1>
                                </div>
                            </div>
                            @foreach ($vehicles as $vehicle)
                            <div id="car-groups">
                                <div class="car-item customCarItem">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="row car-item__inner--shadow">
                                                <div class="col-sm-3 col-12 car-item__column--first">
                                                    <h2 class="car-item--headline">
                                                            {{$vehicle->manufacturer}} {{ $vehicle->model}}  - {{$vehicle->year}}
                                                        <small> {{ $vehicle->rental_agency->name}}</small>
                                                    </h2>
                                                    <div class="car-item--short-description">
                                                        <span class="customCarItem__span">{{$vehicle->description}}</span>
                                                        <span class="customCarItem__span customCarItem__span--infoMotor">{{ $vehicle->color}}</span>
                                                        <hr class="customCarItem__hr">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 car-item__column--middle">
                                                    <img src="{{$vehicle->image}}" alt="Car Rental" title="Car rental " class="car-item--image">
                                                </div>

                                                <div class="col-sm-3 col-12 car-item__column--last">
                                                    <div class="card">
                                                        <div class="card__headline">KM</div>
                                                        <div class="card__body">
                                                            <span class="card__body--dollar">KWD</span>
                                                            <span class="card__body--price customCarItem__price">{{$vehicle->value}}
                                                                <small class="customCarItem__price--cents">,00</small></span>
                                                            <span class="card__body--daily customCarItem__daily">/daily</span>
                                                        </div>
                                                    </div>
                                                    <div class="hidden-xs-down">
                                                        <input type="hidden" name="hdn-code" class="hdn-code" value="ECMM">
                                                        <a title="Selecionar Carro" href="{{route('rentals.vehicles.rent', $vehicle->id)}}" class="button flat contrast shadow--light-2x big--font-small big--font-secondary block btn-select-group">Rent</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{$vehicles->links()}}
                            <br>
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
                            <p>
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




