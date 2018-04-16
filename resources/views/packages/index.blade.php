@extends('layouts.header_footer')

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
                <div class="card-header">Monthly pet supplies delivery service</div>

                <div class="card-body">
                    Choose one of our premade packages or create your own to get started. Add your package(s) to your delivery box and we will deliver them to your door every month!
                </div>
                <div class="card-body">
                  <a href="{{ url('/') }}/packages/available">
                  <button type="submit" class="btn btn-primary" style="float: left;">
                      Choose one of our packages
                  </button>
                  </a>
                  <a href="{{ url('/') }}/packages/custom">
                  <button type="submit" class="btn btn-primary" style="float: right;">
                      Create your own package
                  </button>
                  </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
