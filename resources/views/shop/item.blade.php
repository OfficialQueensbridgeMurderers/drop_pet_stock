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
                      <img src={{ $item->img_path }} height="{{ $item->img_height }}" width="{{ $item->img_width }}" hspace="100">
                    </div>
                    <div style="float: left;">
                      Animal : {{ $item->animal }}<br/>
                      Category : {{ $item->category }}<br/>
                      Weight : {{ number_format($item->poids, 2, '.', ',') }}<br/>
                      Price : {{ number_format($item->prix_vente, 2, '.', ',') }}<br/>
                      Shipping fee : {{ number_format($item->cout_livraison, 2, '.', ',') }}<br/>
                      <b>Total : {{ number_format($item->cout_livraison + $item->prix_vente, 2, '.', ',') }}<b/><br/>
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
</div>
@endsection
