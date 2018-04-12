@extends('layouts.app')
@section('content')
@include('shop.layout.shop')
<link rel="stylesheet" type="text/css" href="css/shop.css">
<div class="container">
  <section>
  <div class="row justify-content-left" style="float: left;">
      <div class="col-md-14">
          <div class="card">
              <div class="card-header">Sort by :</div>
              <form action="{{ $category }}" method="get">
                <div class="card-body">
                  Name of the item : <br>
                  @if ($search != "_none_")
                  <input type="text" name="search" value="{{ $search }}">
                  @else
                  <input type="text" name="search" value="">
                  @endif
                </div>
                <div class="card-body">
                  Animal : <br>
                  All animals <input type="radio" name="animals" value="_all_" checked><br>
                  @foreach ($animals as $animal)
                  {{ $animal }}
                  @if ($animal == $selectedAnimal)
                    <input type="radio" name="animals" value="{{ $animal }}" checked>
                  @else
                    <input type="radio" name="animals" value="{{ $animal }}">
                  @endif
                  <br>
                  @endforeach
                </div>
                <div class="card-body">
                  <input type="submit">
                </div>
              </form>
          </div>
      </div>
  </div>
    <div class="row justify-content-center" >
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><a style="font-size:300%;">@if($category == "all_items")All items @else {{ $category }}@endif<a/></div>
                  @foreach ($items as $item)
                  <div class="card-body">
                    <img src="{{ url('/') }}{{ $item->img_path }}" height="100", width="100">
                    <a href="{{ url('/') }}/shop/item/{{ $item->id }}/0">{{ $item->nom }}<a/>
                    <br/>
                  </div>
                  @endforeach
                  @if (count($items) == 0)
                  <br>
                   - No item matching your search criteria was found -
                  <br>
                  <br>
                  @endif
            </div>
        </div>
    </div>
    <section/>
</div>
@endsection
