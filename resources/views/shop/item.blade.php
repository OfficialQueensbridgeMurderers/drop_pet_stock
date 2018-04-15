@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="css/shop.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <a href="{{ url('/') }}/shop/category/{{ $item->category }}">
          <button type="submit" class="btn btn-primary">
              Back
          </button>
          </a><br>
            <div class="card">
                <div class="card-header">{{ $item->nom }}</div>
                <div class="card-body">
                  <section>
                    <div style="float: left;">
                      <img src="{{ url('/') }}{{ $item->img_path }}" height="{{ $item->img_height }}" width="{{ $item->img_width }}" hspace="100">
                    </div>
                    <div style="float: left;">
                      Animal : {{ $item->animal }}<br/>
                      Category : {{ $item->category }}<br/>
                      Weight : {{ number_format($item->poids, 2, '.', ',') }}<br/>
                      Price : {{ number_format($item->prix_vente, 2, '.', ',') }}<br/>
                      Shipping fee : {{ number_format($item->cout_livraison, 2, '.', ',') }}<br/>
                      <b>Total : {{ number_format($item->cout_livraison + $item->prix_vente, 2, '.', ',') }}</b><br/>
                      <br/>
                      <button type="submit" class="btn btn-primary">
                          Add to cart
                      </button>
                      <br>
                      <br>
                      <div class="dropdown">
                        <button onclick="myFunction()" class="btn btn-primary dropbtn">Add to custom package</button>
                        <div id="myDropdown" class="dropdown-content">
                          <a href="{{ url('/') }}/packages/custom/create">Create new package</a>
                          @foreach ($customPackages as $package)
                            <a href="{{ url('/') }}/packages/custom/add/{{ $package->id }}/{{ $item->id }}">{{ $package->name }}</a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if ($create == 1 && !Auth::guest())
          <div class="card">
              <div class="card-header">Write a review</div>
              <div class="card-body">
                <form action="{{ url('/') }}/shop/item/{{ $item->id }}" method="get">
                  Rate this item
                  <br>
                  1- 2- 3- 4- 5
                  <br>
                  <input type="radio" name="rating" value="1" required>
                  <input type="radio" name="rating" value="2" required>
                  <input type="radio" name="rating" value="3" required>
                  <input type="radio" name="rating" value="4" required>
                  <input type="radio" name="rating" value="5" required>
                  <br>
                  <textarea name="text" cols="40" rows="5" required></textarea>
                  <br>
                  <br>
                  <button type="submit" class="btn btn-primary">
                      Post
                  </button>
                </form>
              </div>
          </div>
          <br>
          <br>
          @endif
            <div class="card">
                <div class="card-header">Reviews</div>
                <div class="card-body">
                  @if ($create != 1 && !Auth::guest())
                    <form action="{{ url('/') }}/shop/item/{{ $item->id }}" method="get">
                      <input type="text" name="show" value="show" style="display: none;">
                  <button type="submit" class="btn btn-primary" style="float: right;">
                      + Write a review
                  </button>
                </form>
                @elseif (!Auth::guest())
                  <form action="{{ url('/') }}/shop/item/{{ $item->id }}" method="get">
                    <input type="text" name="hide" value="hide" style="display: none;">
                <button type="submit" class="btn btn-primary" style="float: right;">
                     - Hide review writing
                </button>
              </form>
              @endif
                @if (count($reviews) == 0)
                No user has reviewed this item
                @else
                {{ count($reviews) }}
                users have reviewed this item
                <br>
                <br>
                @endif
                  <?php $isTop = 0; ?>
                  @foreach ($reviews as $review)
                  <hr>
                  Review by {{ $review->user->name }}
                  <?php $isTop = $isTop + 1; ?>
                    <br>
                    <br>
                    {{ $review->stars }}
                    @if ($review->stars == 1)
                    Star
                    @else
                    Stars
                    @endif
                    <img src="{{ url('/') }}/storage/star{{ $review->stars }}.jpg" height="30" width="150" hspace="10">
                </div>
                  <div class="card-body">
                   {{ $review->text }}
                   <br>
                   <br>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
if (!event.target.matches('.dropbtn')) {

  var dropdowns = document.getElementsByClassName("dropdown-content");
  var i;
  for (i = 0; i < dropdowns.length; i++) {
    var openDropdown = dropdowns[i];
    if (openDropdown.classList.contains('show')) {
      openDropdown.classList.remove('show');
    }
  }
}
}
</script>
<style>
.dropbtn {
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}
</style>
@endsection
