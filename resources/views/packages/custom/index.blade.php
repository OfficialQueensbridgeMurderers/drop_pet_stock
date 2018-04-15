@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My custom packages</div>
                <div class="card-body">

                <a href="{{ url('/') }}/packages/custom/create">
              <button type="submit" class="btn btn-primary" style="float: right;">
                  Create custom package
              </button>
            </a>
            @if (count($customPackages) == 0)
               - You do not have any custom package
              <br>
              <br>
            @else
             - You have {{ count($customPackages) }} custom packages
            <br>
            <br>
            @endif
            <a href="{{ url('/') }}/shop">
          <button type="submit" class="btn btn-primary" style="float: right;">
              Add items to your packages
          </button>
        </a>
            </div>
                @foreach ($customPackages as $package)
                <hr>
                <div class="card-body">
                  <form action="{{ url('/') }}/packages/custom/delete/{{ $package->id }}" method="get" onsubmit="return confirm('Do you really want to delete this package?');">
                    <button type="submit" class="btn btn-primary" style="float: right;">
                        Delete package
                    </button>
                  </form>
                  Package name : {{ $package->name }}
                  <br>
                  <br>
                  Items :
                  <br>
                    @foreach ($package->items as $item)

                      <form action="{{ url('/') }}/packages/custom/update/{{ $item->id }}" method="get">
                        <div style="float: left;">
                        {{ $item->produit->nom }} x <input type="text" name="quantity" value="{{ $item->quantity }}" size="4"/>
                      </div>
                      <br>
                      <br>
                        <button type="submit" class="btn btn-primary" style="float: left; margin-right: 5px;">
                            Update quantity
                        </button>
                      </form>

                      <form action="{{ url('/') }}/packages/custom/remove/{{ $item->id }}" method="get" onsubmit="return confirm('Do you really want to delete this item?');">
                        <button type="submit" class="btn btn-primary" >
                            Delete item
                        </button>
                      </form>
                      <br>
                      <br>
                    @endforeach
                    @if (count($package->items) == 0)
                      This package doesn't contain any item
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
