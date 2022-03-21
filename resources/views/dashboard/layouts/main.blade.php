@push('addon-head')
  <!-- BootstrapMade (NiceAdmin) -->
  <link href="{{ asset('library/niceadmin/style.css') }}" rel="stylesheet">
@endpush

@extends('layouts.index')

@section('body')
  @include('dashboard.layouts.header')

  @include('dashboard.layouts.sidebar')

  <main id="main" class="main">
    <section class="section dashboard">
      @yield('main')
    </section>
  </main>

  @include('dashboard.layouts.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Sign out</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Press confirmation button to sign out
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Confirm</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('addon-script')
   <!-- NiceAdmin -->
   <script src="{{ asset('library/niceadmin/script.js') }}"></script>
@endpush