@extends('dashboard.layouts.main')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Profile Page</h1>
  </div>

  @if ($notification = Session::get('success'))
  <div class="col-xl-8 alert alert-success alert-dismissible fade show" role="alert">
    {{ $notification }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if ($notification = Session::get('failed'))
  <div class="col-xl-8 alert alert-danger alert-dismissible fade show" role="alert">
    {{ $notification }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if ($errors->any())
    <div class="col-xl-8 alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <section class="section profile">
    <div class="row">
      <div class="col-xl-8">
        <div class="card">
          <div class="card-body pt-3">
            <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Change Profile</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>
            </ul>
            <div class="tab-content pt-2">
              <div class="tab-pane fade profile-edit pt-3 show active" id="profile-edit">
                <form action="{{ route('profile') }}" method="POST">
                  @csrf
                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" required>
                      @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" required>
                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                    </div>
                  </div>
      
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
      
              </div>
              <div class="tab-pane fade pt-3" id="profile-change-password">
                <form action="{{ route('password.change') }}" method="POST">
                  @csrf
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input required type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" value="{{ old('current_password') }}">
                      @error('current_password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input required type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                      <div class="form-text">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                      </div>
                    </div>
                  </div>
      
                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Password Confirmation</label>
                    <div class="col-md-8 col-lg-9">
                      <input required type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}">
                      @error('password_confirmation')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
      
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Password</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
