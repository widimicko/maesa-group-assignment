@push('head')
    <link href="{{ asset("library/flexstart/style.css") }}" rel="stylesheet">
@endpush

@extends('layouts.index')

@section('body')
	<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <span>Maesa Group</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#product">Product</a></li>
          <li><a class="nav-link scrollto" href="#footer-palindrome">Palindrom Checker</a></li>
          <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
          <li><a class="getstarted" href="{{ route('register') }}">Register</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>
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
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>
        <div class="row gy-4 product-container" data-aos="fade-up" data-aos-delay="200">
					@if (!$products->first())
						<p class="fw-bold fs-5 text-center">There are no products available yet</p>
					@else
						@foreach ($products as $product)
							<div class="col-lg-4 col-md-6 product-item filter-app">
								<div class="product-wrap">
									<img src="{{ asset('storage/'. $product->image) }}" class="img-fluid" alt="">
									<div class="product-info">
										<h4>{{ $product->name }}</h4>
										<p>App</p>
										<div class="product-links">
											<a href="product-details.html" title="More Details"><i class="bi bi-link"></i></a>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					@endif
        </div>
      </div>
    </section>


  <footer id="footer" class="footer">
		<div class="footer-palindrome" id="footer-palindrome">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h4>Palindrome Checker</h4>
            <p>A palindrome is a word, number, phrase, or other sequence of characters which reads the same backward as forward, such as madam or racecar.</p>
					</div>
          <div class="col-lg-6">
            <form onsubmit="palindromeCheck()" class="mb-3">
              <input type="text" id="stringValue">
							<input type="submit" value="Check">
            </form>
						<div id="result"></div>
          </div>
        </div>
      </div>
    </div><hr>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection

@push('script')
    <script src="{{ asset('library/flexstart/script.js') }}"></script>
		<script src="{{ asset('js/palindrome.js') }}"></script>
		<script>
			const resultElement = document.getElementById('result')

			function showResult(status) {
				let message = ''

				if (status === 'success') {
					message = 'That was a Palindrome'
				} else {
					message = 'That was not a Palindrome'
				}

				resultElement.innerHTML = `
					<div class="alert alert-${status} alert-dismissible fade show" role="alert">
						${message}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				`
			}

			function palindromeCheck() {
				event.preventDefault()

				const stringValue = document.getElementById('stringValue').value
				if (stringValue == '') return
				isPalindrome = checkPalindrome(stringValue)
				
				if (isPalindrome) {
					showResult('success')
				} else {
					showResult('danger')
				}
			}
		</script>
@endpush