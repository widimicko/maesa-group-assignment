@push('head')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.css"/>
@endpush

@extends('dashboard.layouts.main')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categories Data Page</h1>
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

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h5 class="card-title">Categories table data</h5>
        <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#createModal">
          <i class="bi bi-plus"></i> Create
        </button>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" border="1">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)  
            <tr>
              <td> {{ $loop->iteration }} </td>
              <td> {{ $category->name }} </td>
              <td> {{ $category->created_at }} </td>
              <td> {{ $category->updated_at->diffForHumans() }} </td>
              <td>
                <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id="{{ $category->id }}" data-bs-name="{{ $category->name }}">
                  <i class="bi bi-pencil"></i> Edit
                </button>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
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

  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('categories.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Create Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="editForm" method="POST">
          @method('put') @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" id="name" name="name" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>


@endsection

@push('script')
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.js"></script>
  <script src="{{ asset('/js/library.init.js') }}"></script>
  <script>
    const editModal = document.getElementById('editModal')
    editModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget

      const id = button.getAttribute('data-bs-id')
      const name = button.getAttribute('data-bs-name')

      document.getElementById('editForm').setAttribute('action', `${window.location.origin}/dashboard/categories/${id}`)

      editModal.querySelector('#name').value = name
    })
  </script>
@endpush