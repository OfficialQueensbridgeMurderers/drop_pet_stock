@extends('layouts.header_footer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <a href="{{ url('/') }}/packages/custom">
          <button type="submit" class="btn btn-primary">
              Back
          </button>
          </a>
          <br>
            <div class="card">
                <div class="card-header">Create a custom package</div>
                <div class="card-body">
                <form action="{{ url('/') }}/packages/custom/create" method="get">
                  <br>
                  Package name : <input type="text" name="name" required>
                  <br>
                  <br>
                  <button type="submit" class="btn btn-primary" style="float: left;">
                    Create
                  </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
