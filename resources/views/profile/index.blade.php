@extends('layouts.header_footer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                  <a style="font-size: 200%">
                    User profile
                  </a>
                  <button type="submit" class="btn btn-primary">
                    Edit profile
                </button>
                  <br>
                  <br>
                  Name : {{ $user->name}}<br>
                  Email : {{ $user->email}}<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
