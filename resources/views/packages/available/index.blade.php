@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Available packages</div>
                <?php $i = 0; ?>
                @foreach ($packages as $package)
                <div class="card-body">
                  Package #{{ $package->id }}
                  <br>
                    @foreach ($package->items as $item)
                      {{ $item->produit->nom }}
                      <br>
                    @endforeach
                </div>
                <?php $i = $i+1; ?>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
