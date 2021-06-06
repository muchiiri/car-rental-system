
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
    <link href="{{ asset('/font-awesome/css/font-awesome.css')}}"  rel="stylesheet" />
<link href="{{ asset('/font-awesome/css/fontawesome.css')}}"  rel="stylesheet" />
<!-- Remember to include jQuery : -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


    <title>Cars For You - Rentals</title>
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
                            <a class="navbar-brand"><img src="{{asset('/img/logo.png')}}" width="175" alt="Autobridge" title="Autobridge" class="img-responsive"></a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <ul data-nav-partner="false">
                                    <li><a href="/" ><span>Home</span></a></li>
                                    <li><a href="#" ><span>For You</span></a></li>
                                    <li><a href="#" ><span>Partnerships & Offers</span></a></li>
                                    <li><a href="#" ><span>Service</span></a></li>
                                    <li><a href="/rentals" ><span>My Reservations</span></a></li>
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
                                    <small class="headline--subtitle">Here you can find some options.
                                    available for you...</small>
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                           {{--  oi  --}}

  <div class="widget-content nopadding">
    <table class="table table-bordered table-hover table-condensed" style="margin-top:-50px;margin-bottom:150px">
      <thead>
        <tr>
          <th scope="col">Photo</th>
          <th scope="col">Vehicle</th>
          <th scope="col">Location</th>
          <th scope="col">Amount</th>
          <th scope="col">Status</th>
          <th scope="col">Return date</th>
          <th scope="col">created At</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($rentals as $rental)
        <tr class="gradeX">
           <td class="align-middle"><img src="{{asset($rental->vehicle->image)}}" alt="{{($rental->vehicle->model)}}" width="90" /></td>
          <td class="align-middle">{{ $rental->vehicle->manufacturer}} - {{ $rental->vehicle->model}} - {{ $rental->vehicle->year}} - {{ $rental->vehicle->color}} - {{ $rental->vehicle->license_plate}}</td>
          <td class="align-middle">{{ $rental->vehicle->rental_agency->name}} - {{ $rental->vehicle->rental_agency->city}}</td>
          <td class="align-middle">R$ {{ $rental->value}},00</td>
          <td class="align-middle">{{ $rental->status}}</td>
          <td class="align-middle">{{ $rental->return_date}}</td>
          <td class="align-middle">{{ $rental->created_at}}</td>
          <!-- btn btn-success btn-xs <i class="icon-eye-open"></i>-->
          @can('alter_status', App\Rental::class)
            @if ($rental->status != 'fineshed')
            <td class="actions">
              <form action="{{ route('rentals.update', $rental->id)}}" method="post">
                @method('PUT')
                @csrf
                  <select name="status">
                    <option value="">Select</option>
                    <option value="progress">Progress</option>
                    <option value="fineshed">Closed</option>
                  </select>
                  <input type="submit" class="btn btn-success" value="Atualizar status">
              </form>
            </td>
            @endif
          @endcan
          @can('alter_by_client', App\Rental::class)
          @if ($rental->status != 'fineshed')
            <td class="actions"><p><a href="#ex1" rel="modal:open"><img src="{{asset('img/calendar.png')}}" width="50"></a></p>
             <div id="ex1" class="modal">
  <form action="{{ route('rentals.update', $rental->id)}}" method="post">
                @method('PUT')
                @csrf



                    <div class="modal-header">
                      <h4 class="modal-title" id="modalLabel">What is the new return date?</h4>
                    </div>
                    <div class="modal-body">
                      <div class="control-group">
                        <label class="control-label">Return date:</label>
                            <div class="controls">
                            <input name="return_date" type="datetime-local" value="2019-06-29T10:26"min="<?php echo $date ?>" class="span5">
                            </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <a href="#" rel="modal:close">Cancel</a>
                      <b><input style="color:#008000"type="submit" class="btn btn-success" value="Atualizar"></b>

                    </div>

              </form>

</div>
            </td>
            @endif
          @endcan


        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
                           {{--  tchau  --}}
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
                        <p>
                            <br>© 2021 Cars For You 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>

</body>

</html>
