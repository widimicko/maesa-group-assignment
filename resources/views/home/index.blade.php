@extends('home.layouts.main')

@section('content')
  <section id="hero" class="hero d-flex align-items-center" style="background-image: url('{{ asset('image/hero-bg.png')}}');">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">We offer unique product for growing your business</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">We are team of talented person making product with skill</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Get Started</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('image/hero-img.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>

  <main id="main">
    <section id="product" class="product">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>Product</h2>
          <p>Check our products</p>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="product-flters">
              @if (!$categories->first())
                <p class="fw-bold fs-5 text-center">There are no category available yet</p>
              @else
                <li data-filter="*" class="filter-active">All</li>
                @foreach ($categories as $category)
                  <li data-filter=".filter-{{ $category->id }}">{{ $category->name }}</li>
                @endforeach
              @endif
            </ul>
          </div>
        </div>
        <div class="row gy-4 product-container" data-aos="fade-up" data-aos-delay="200">
					@if (!$products->first())
						<p class="fw-bold fs-5 text-center">There are no products available yet</p>
					@else
						@foreach ($products as $product)
							<div class="col-lg-4 col-md-6 product-item filter-{{$product->category_id}}">
								<div class="product-wrap">
                  @if ($product->image == '')
                    <img src="{{ asset('image/cyan_box.jpg') }}" alt="" class="img-fluid">
                  @else
									  <img src="{{ asset('storage/'. $product->image) }}" class="img-fluid" alt="">
                  @endif
									<div class="product-info">
										<h4>{{ $product->name }}</h4>
										<div class="product-links">
											<a href="{{ url('/product/'. $product->id) }}" title="More Details" class="stretched-link"><i class="bi bi-link"></i></a>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					@endif
        </div>
        <div class="mt-3">
          {{ $products->links() }}
        </div>
      </div>
    </section>
@endsection
