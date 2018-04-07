@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="css/shop.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a style="font-size:300%;">Shop Items<a/></div>
                <div class="card-body" >
                  <div class="card">
                      <div class="card-header">Featured Items</div>
                      <div class="card-body">
                        <section>
                          <?php $isTop = 0; ?>
                        @foreach ($featuredItems as $item)
                            @if ($isTop === 0)
                            <a href="tameer">
                            <img src={{ $item->img_path }} height="200" width="200" hspace="25">
                            <a/>
                            <?php $isTop = 1; ?>
                            @else
                            <a href="sameer">
                            <img src={{ $item->img_path }} height="200" width="200" hspace="25" class="top">
                            <a/>
                            @endif
                        @endforeach
                      </section>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      <br/>
                      </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="card">
                      <div class="card-header">Categories</div>
                      <div class="card-body">
                      <a href="shop/category/all_items">All items<a/>
                      </div>
                        @foreach ($categories as $category)
                        <div class="card-body">
                          <a href="shop/category/{{ $category }}">{{ $category }}<a/>
                          <br/>
                        </div>
                        @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
