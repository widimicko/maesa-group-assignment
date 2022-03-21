@push('head')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.css"/>
@endpush

@extends('dashboard.layouts.main')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products Data Page</h1>
  </div>

  @if ($notification = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ $notification }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if ($notification = Session::get('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ $notification }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h5 class="card-title">Products table data</h5>
        <a href="{{ route('products.create') }}" class="btn btn-primary my-3"><i class="bi bi-plus"></i> Create</a>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" border="1">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>              
              <th>Image</th>
              <th>Description</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product) 
            <tr>
              <td> {{ $loop->iteration }} </td>
              <td> {{ $product->name }} </td>
              <td><img src="{{ asset('storage/'.$product->image) }}" class="img-fluid" style="height: 150px" alt="{{ $product->name }}"></td>
              <td> {{  Str::limit($product->description, 15) }} </td>
              <td> {{ $product->created_at }} </td>
              <td> {{ $product->updated_at->diffForHumans() }} </td>
              <td>
                <a href="{{ route('products.edit', $product->id) }}" class="mb-2 btn btn-info text-white"><i class="bi bi-pencil"></i> Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                  @method('delete') @csrf
                  <button class="mb-2 btn btn-danger border-0" onclick="return confirm('Are you sure to delete data?')"><i class="bi bi-trash"></i> Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('script')
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.js"></script>
  <script src="{{ asset('/js/library.init.js') }}"></script>
@endpush