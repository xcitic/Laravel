<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-AU-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guestbook</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
  </head>
  <body>

    <div id="app">
      <nav class="navbar navbar-findcond">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home')}}">Guestbook</a>
          </div>

          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
              <li class="active">
                <a href="{{ route('sign') }}">Sign the GuestBook</a>
              </li>
              </ul>
          </div>

        </div>

      </nav>
      @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>

  </body>
</html>
