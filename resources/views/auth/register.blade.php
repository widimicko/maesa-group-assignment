@extends('layouts.index')

@push('head')
    <link href="{{ asset('library/niceadmin/style.css') }}" rel="stylesheet">
@endpush

<main>
  <div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="#" class="logo d-flex align-items-center w-auto">
                <span class="d-none d-lg-block">Maesa Group</span>
              </a>
            </div>

            <div class="card mb-3">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                  <p class="text-center small">Enter your personal details to create account</p>
                </div>

                <form class="row g-3 needs-validation" action="{{ route('register') }}" method="POST">
                  @csrf
                  <div class="col-12">
                    <label class="form-label">Your Name</label>
                    <input type="text" name="name" class="form-control" required>
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="col-12">
                    <label class="form-label">Your Email</label>
                    <input type="email" name="email" class="form-control" required>
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="col-12">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="col-12">
                    <label class="form-label">Password Confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                    @error('password_confirmation')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
                  </div>
                </form>

              </div>
            </div>

            <div class="credits">
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
</main>

@push('script')
    <sceipt src="{{ asset('library/niceadmin/script.css') }}"></sceipt>
@endpush
