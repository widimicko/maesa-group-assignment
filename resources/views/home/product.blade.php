@extends('home.layouts.main')

@section('content')
<main id="main">
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="/">Home</a></li>
        <li>{{ $product->name }} Details</li>
      </ol>
      <h2>{{ $product->name }} Details</h2>

    </div>
  </section>
  <section id="product-details" class="product-details">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="product-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                @if ($product->image == '')
                <img src="{{ asset('image/cyan_box.jpg') }}" alt="">
                @else
                <img src="{{ asset('storage/'. $product->image) }}" alt="">
                @endif
              </div>

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="product-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Created At</strong>: {{ $product->created_at }}</li>
              <li><strong>Last Update</strong>: {{ $product->updated_at }}</li>
            </ul>
          </div>
          <div class="product-description">
            <h2>Product description</h2>
            <p>
             {{ $product->description }}
            </p>
          </div>
        </div>

      </div>

    </div>
  </section>

</main>
@endsection
