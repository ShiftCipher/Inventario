@extends('layouts.app')

@section('content')

  <div class="container">

    <p><a href="/categories">{{ $product->category->name or Blank }}</a> / {{ $product->name }}</p>
    <h1>{{ $product->name }}</h1>
    <h2>{{ $product->store->name or Blank }}</h2>

    <hr>

    <div class="row">
      <div class="col-md-4">
        <img src="{{ asset('img/' . $product->photo) }}" alt="product" class="img-responsive">
      </div>

      <div class="col-md-8">
        <h3>${{ $product->price }}</h3>
        <form action="/cart" method="POST" class="side-by-side">
          {!! csrf_field() !!}
          <input type="hidden" name="id" value="{{ $product->id }}">
          <input type="hidden" name="name" value="{{ $product->name }}">
          <input type="hidden" name="price" value="{{ $product->price }}">
          <h3>Provider: {{ $product->provider->name or 'Blank' }}</h3>
          <h3>Stock: {{ $product->stock }}</h3>
          <h3>State: {{ $product->state->name or 'Blank' }}</h3>
          <h3>Serial: {{ $product->serial or 'Blank' }}</h3>
          <h3>Model: {{ $product->year or 'Blank' }}</h3>
          <h3>Buy Date: {{ $product->buy or 'Blank' }}</h3>
          <h3>Price: {{ $product->price or 'Blank' }}</h3>
          <h3>Warranty: {{ $product->warranty or 'Blank' }} Months</h3>
          <input type="submit" class="btn btn-success btn-lg" value="Add to Cart">
        </form>

        <form action="/wishlist" method="POST" class="side-by-side">
          {!! csrf_field() !!}
          <input type="hidden" name="id" value="{{ $product->id }}">
          <input type="hidden" name="name" value="{{ $product->name }}">
          <input type="hidden" name="price" value="{{ $product->price }}">
          <input type="submit" class="btn btn-primary btn-lg" value="Add to Wishlist">
        </form>


        <br><br>

        {{ $product->description }}
      </div> <!-- end col-md-8 -->
    </div> <!-- end row -->

    <div class="spacer"></div>

    <div class="row">
      <h3>You may also like...</h3>

      @foreach ($interested as $product)
        <div class="col-md-3">
          <div class="thumbnail">
            <div class="caption text-center">
              <a href="{{ url('shop', [$product->slug]) }}"><img src="{{ asset($product->photo) }}" alt="" class="img-responsive"></a>
              <a href="{{ url('shop', [$product->slug]) }}"><h3>{{ $product->name }}</h3>
                <p>{{ $product->price }}</p>
              </a>
            </div> <!-- end caption -->

          </div> <!-- end thumbnail -->
        </div> <!-- end col-md-3 -->
      @endforeach

      <br>

      <h1>Product Maintenances</h1>

      <table class="table">

        <thead>
          <tr>
            <th>ID</th>
            <th>Product Name</th>
          </tr>
        </thead>

        @foreach($product->maintenances as $maintenance)
          <tr>
            <td>{{ $maintenance->id }}</td>
            <td>{{ $maintenance->name }}</td>
          </tr>
        @endforeach

      </table>
    </div>
  </div>

@endsection
