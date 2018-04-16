<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>header footer</title>

  <!--fonts-->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">

  <!--Style header_footer-->
    <link href="{{ asset('css/header_footer.css')}}" rel="stylesheet">
    <link href="{{ asset('css/contentcss.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!--Scripts Javascript-->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
      $( document ).ready(function() {
        $('[data-toggle=search-form]').click(function() {
          $('.search-form-wrapper').toggleClass('open');
          $('.search-form-wrapper .search').focus();
          $('html').toggleClass('search-form-open');
        });
        $('[data-toggle=search-form-close]').click(function() {
          $('.search-form-wrapper').removeClass('open');
          $('html').removeClass('search-form-open');
        });
        $('.search-form-wrapper .search').keypress(function( event ) {
          if($(this).val() == "Search") $(this).val("");
        });
        $('.search-form-wrapper').click(function(event) {
          $('.search-form-wrapper').removeClass('open');
          $('html').removeClass('search-form-open');
        });
      });
    </script>
  </head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
   <div class="container">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand-img navbar-left" href="{{ base_path() }}"><img src="{{ url('/') }}/storage/dps-banner.png" alt="dps-banner.png"/></a>
         <a class="navbar-brand" href="{{ url('/') }}/shop">Items Shop</a>
         <a class="navbar-brand" href="{{ url('/') }}/profile">User Profil</a>
         <a class="navbar-brand" href="{{ url('/') }}/packages">Packages</a>
      </div><!--/navheader-->
      <div class="login">
         <ul class="nav navbar-nav navbar-right">
           @guest
           <li><a class="login" href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
           <li><a class="login" href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span>  Register</a></li>
           @else
           <li>
             <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
               {{ Auth::user()->name }} <span class="caret"></span>
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
               </form>
             </div><!--/dropdown-->
           </li>
           @endguest
          </ul>
        </div><!--/login-->

      <div id="navbar" class="navbar-collapse collapse">
         <div class="hidden-xs navbar-form navbar-right">
            <a href="#search" id="tigger" class="search-form-tigger btn btn-success"  data-toggle="search-form"><i class="fa fa-search" aria-hidden="true"></i></a>
         </div><!--/navbarcollapse-->
		       <div class="visible-xs navbar-form navbar-right">
            <input type="text" name="search" class="search form-control" placeholder="Search">
          </div>
          <!--/.navbar-collapse -->
      </div><!--/navbar collapse-->
   </div>
</nav>
<div class="search-form-wrapper">
   <form class="search-form" id="" action="">
      <div class="input-group">
         <input type="text" name="search" class="search form-control" placeholder="Search">
         <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i>
         </span>
         <span class="input-group-addon search-close" id="basic-addon2"><i class="fa fa-window-close" aria-hidden="true"></i>
         </span>
      </div>
   </form>
</div>

  <main class="maincontent">
    @yield('content')
  </main>
  <footer>
    <p>Copyright © 2018 DPS Inc. ® (Montreal,Canada)
    Copyright laws make it illegal to copy any form of original work without the permission of the author.
      The author or creator of a work has certain legal rights. These rights apply even if the work does not contain
      a statement noting that the work is copyrighted. The general rules of copyright also apply to downloading information
      from the Internet and using computer software.</p>

  </footer>
</body>
</html>
