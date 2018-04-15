<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Drop_pet_stock header footer</title>

        <!--Style header_footer-->
        <link href="{{ asset('css/header_footer.css') }}" rel="stylesheet">
    </head>

    <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="topnav">
          <a class="active" href="#home">Home</a>
          <a href="{{ url('/') }}/shop">Items Shop</a>
          <a href="/profil">User Profil</a>
          <a href="/forfaits">Packages</a>
        </div>
        <div class="search_bar">
          <form class="form-inline my-2 my-lg-0" method="post"action="searchresult.php">
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="bouton" type="submit">Search</button>
          </form>
        </div>
      </nav>

        <!--Contents-->
        <div class="container">
            @yield('content')
        </div>


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div id=footer>
            <p>©DPS, 2018 - All right reserved
              <a class="contact_right" href="#contact">Contact</a>
            </p>
          </div>
        </nav>





    </body>
</html>
