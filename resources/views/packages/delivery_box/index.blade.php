@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <a href="{{ url('/') }}/packages">
          <button type="submit" class="btn btn-primary">
              Back
          </button>
          </a>
          <br>
            <div class="card">
                <div class="card-header">My delivery box</div>
                <div class="card-body">
                  @if (count($userPackages) == 0 && $nbCustom == 0)
                    <br>
                     - You do not have any package in your delivery box
                  @else
                  <br>
                   - You have {{ count($userPackages) }} premade packages and {{ $nbCustom }} custom packages in your delivery box
                  @endif
                </div>
                @foreach ($userPackages as $userPackage)
                <hr>
                <div class="card-body">
                  <form action="{{ url('/') }}/packages/custom/remove/{{ $userPackage->id }}" method="get" onsubmit="return confirm('Do you really want to remove this package?');">
                    <button type="submit" class="btn btn-primary" name="premade" value="not_empty" style="float: right;">
                        Remove from delivery box
                    </button>
                  </form>
                  Premade package : {{ $userPackage->package->name }}
                  <br>
                  Price : {{ $userPackage->package->prix }} $
                  <br>
                  <br>
                  Items :
                  <br>
                  @foreach ($userPackage->package->items as $item)
                    {{ $item->produit->nom }} x{{ $item->quantity }}
                    <br>
                  @endforeach
                </div>
                @endforeach
                @foreach ($customPackages as $customPackage)
                @if ($customPackage->is_activated && count($customPackage->items) != 0)
                <hr>
                <div class="card-body">
                  <form action="{{ url('/') }}/packages/custom/toggle/{{ $customPackage->id }}" method="get" onsubmit="return confirm('Do you really want to remove this package?');">
                    <button type="submit" class="btn btn-primary" style="float: right;">
                        Remove from delivery box
                    </button>
                  </form>
                  Custom package : {{ $customPackage->name }}
                  <br>
                  Price : {{ $customPackage->price }} $
                  <br>
                  <br>
                  Items :
                  <br>
                  @foreach ($customPackage->items as $item)
                    {{ $item->produit->nom }} x{{ $item->quantity }} - {{ $item->produit->prix_vente }} $
                    <br>
                  @endforeach
                </div>
                @endif
                @endforeach
            </div>
            <form action="{{ url('/') }}/packages/checkout" method="get">
              <button type="submit" class="btn btn-primary" style="float: right; margin-top: 10px;">
                  Subscribe to our monthly delivery service
              </button>
            </form>
        </div>
    </div>
</div>
@endsection
