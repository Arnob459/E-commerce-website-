@extends('admin.layouts.template')
@section('page_title')
    Add Category - Marketiah
@endsection
@section('content')
<!-- Basic Layout -->
<div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Category</h4>

    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add New Category</h5>
            <small class="text-muted float-end">Input Information</small>
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
          <div class="card-body">
            <form action="{{route('storecategory')}}" method="POST">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="Category_id" name="category_name" placeholder="Electronics" />
                </div>
              </div>              
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection