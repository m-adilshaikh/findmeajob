

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="/css/vendor.css" rel="stylesheet">
  <link href="/css/app.css" rel="stylesheet">
  <link href="/css/dropzone.css" rel="stylesheet">

  <script type="text/javascript" src="/js/app.js"></script>
  <script type="text/javascript" src="/js/dropzone.js"></script>
  <script type="text/javascript" src="/js/custom.js"></script>

  <!-- Scripts -->
  <script>
    window.Laravel = <?php echo json_encode([
      'csrfToken' => csrf_token(),
      ]); ?>
  </script>

  </head>

  <?php 

    $body_class = '';

    if(Auth::check()) {
      $body_class = 'logged-in '.$user_role;
    }

  ?>

  <body class="{{$body_class}}">
    <div id="app">

      <header>
        <a class="logo" href="{{ url('/') }}"><img src={{asset('images/logo.png')}} /></a>
        <nav>
          <ul>
            @if (Auth::guest())
            <li class="login"><a href="{{ url('/login') }}">Login</a></li>
            <li class="register"><a href="{{ url('/register') }}">Register</a></li>
            @else
            <li class="dashboard">
              @if (Request::is('dashboard'))
              <a href="{{ url('dashboard/profile') }}">My Profile</a>
              @else
              <a href="{{ url('/dashboard') }}">Dashboard</a>
              @endif
              <a class="logout" href="{{ url('/logout') }}">
                <i class="power icon"></i>
              </a>
            </li>
            @endif
          </ul>
        </nav>
        <div class="clr"></div>
      </header>

      {{-- <p style="color: #ddd" class="center small"><b>Note: </b> UI is not final. Will be iterated </p> --}}

      @yield('content')

      <div class="blanket ui inverted scrolling dimmer">
        
      </div>

    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
  </body>
  </html>
