@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="css/shop.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
          @if ($create == 1)
          <div class="card">
              <div class="card-header">Write a review</div>
              <div class="card-body">
                <form action="{{ url('/') }}/shop/item/{{ $item->id }}/1" method="get">
                  1- 2- 3- 4- 5
                  <br>
                  <input type="radio" name="rating" value="1">
                  <input type="radio" name="rating" value="2">
                  <input type="radio" name="rating" value="3">
                  <input type="radio" name="rating" value="4">
                  <input type="radio" name="rating" value="5">
                  <br>
                  <textarea name="text" cols="40" rows="5"></textarea>
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
                  @if ($create != 1)
                  <a href="{{ url('/') }}/shop/item/{{ $item->id }}/1">
                  <button type="submit" class="btn btn-primary" style="float: right;">
                      Write a review
                  </button>
                </a>
                @else
                <a href="{{ url('/') }}/shop/item/{{ $item->id }}/0">
                <button type="submit" class="btn btn-primary" style="float: right;">
                    Hide review writing
                </button>
              </a>
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
                  Review by {{ $users[$isTop]->name }}
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
@endsection
