@extends('dashboard.layouts.main')

@section('main')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Product Page</h1>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="card p-3 mb-5">
    <div class="card-title"><p class="fs-5">Create New Product</p></div>
    <div class="card-body">
      <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input required type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <img class="img-preview img-fluid mb-3 col-sm-5">
          <input type="file" name="image" class="form-control" id="image" accept="image/*" onchange="previewImage()">
          @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea name="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
          @error('description')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="d-flex gap-3">
          <a href="{{ route('products.index') }}" class="btn btn-info text-white"><i class="bi bi-box-arrow-left"></i> Back</a>
          <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('script')
  <script>
    function previewImage() {
        const image = document.querySelector('#image')
        const imagePreview = document.querySelector('.img-preview')

        imagePreview.style.display = 'block'
        imagePreview.style.height = '200px'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
          imagePreview.src = oFREvent.target.result
        }
      }
  </script>
@endpush
