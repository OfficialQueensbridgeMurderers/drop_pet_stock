@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="css/shop.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a style="font-size:300%;">{{ $category }}<a/></div>
                  @foreach ($items as $item)
                  <div class="card-body">
                    <img src="{{ $item->img_path }}" height="100", width="100">
                    <a href="{{ url('/') }}/shop/item/{{ $item->id }}">{{ $item->nom }}<a/>
                    <br/>
                  </div>
                  @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
