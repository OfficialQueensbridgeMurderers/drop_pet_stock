@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <a href="{{ url('/') }}/packages/delivery_box">
          <button type="submit" class="btn btn-primary" style="float: right;">
              Delivery box
          </button>
          </a>
          <a href="{{ url('/') }}/packages">
          <button type="submit" class="btn btn-primary">
              Back
          </button>
          </a>
          <br>
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
                  <div style="float: left; margin-right: 15px;">
                  Package name : {{ $package->name }}
                </div>
                <br>
                <br>
                <div style="float: left; margin-right: 10px;">
                  <form id="toggle_{{ $package->id }}" action="{{ url('/') }}/packages/custom/toggle/{{ $package->id }}" method="get">
                  <label class="switch">
                    @if ($package->is_activated)
                    <input type="checkbox" onChange="document.getElementById('toggle_{{ $package->id }}').submit()" checked>
                    @else
                    <input type="checkbox" onChange="document.getElementById('toggle_{{ $package->id }}').submit()">
                    @endif
                    <span class="slider round"></span>
                  </label>
                </form>
                </div>
                @if ($package->is_activated)
                  In delivery box
                @else
                  Not in delivery box
                @endif
                <br>
                  <br>
                  Items :
                  <br>
                    @foreach ($package->items as $item)

                      <form action="{{ url('/') }}/packages/custom/update/{{ $item->id }}" method="get">
                        <div style="float: left; margin-right: 5px; margin-top: 4px;">
                        {{ $item->produit->nom }} x <input type="text" name="quantity" value="{{ $item->quantity }}" size="4"/>
                      </div>
                        <button type="submit" class="btn btn-primary" style="float: left; margin-right: 5px;">
                            Update quantity
                        </button>
                      </form>

                      <form action="{{ url('/') }}/packages/custom/remove/{{ $item->id }}" method="get" onsubmit="return confirm('Do you really want to delete this item?');">
                        <button type="submit" class="btn btn-primary" name="custom" value="not_empty">
                            Delete item
                        </button>
                      </form>
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
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
@endsection
