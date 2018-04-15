@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Available packages</div>
                @foreach ($packages as $package)
                @if ($package->id != 1)
                <hr>
                @endif
                <div class="card-body">
                  {{ $package->name }} - {{ $package->prix }} $
                  <form action="{{ url('/') }}/packages/available" method="get">
                    <input type="text" name="addPackage" value="{{ $package->id }}" style="display: none;">
                <button type="submit" class="btn btn-primary" style="float: right;">
                    Add to delivery box
                </button>
              </form>
                  <br>
                    @foreach ($package->items as $item)
                      {{ $item->produit->nom }} x{{ $item->quantity }}
                      <br>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
