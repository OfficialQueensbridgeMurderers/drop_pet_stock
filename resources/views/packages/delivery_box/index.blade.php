@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My delivery box</div>
                @foreach ($userPackages as $userPackage)
                <div class="card-body">
                  @foreach ($userPackage->package->items as $item)
                    {{ $item->produit->nom }} x{{ $item->quantity }}
                    <br>
                  @endforeach
                </div>
                @endforeach
                @if (count($userPackages) == 0)
                  <br>
                   - You do not have any package in your delivery box
                  <br>
                  <br>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
