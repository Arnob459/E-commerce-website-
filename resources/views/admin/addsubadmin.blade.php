@extends('admin.layouts.template')
@section('page_title')
    Add Sub Admin - Marketiah
@endsection
@section('content')
    <!-- Basic Layout -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add SubAdmin</h4>

<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Add New SubAdmin</h5>
        <small class="text-muted float-end">Input Information</small>
      </div>

      <div class="card-body">
        <form action="{{ route('storesubadmin') }}" method="POST" >
          @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name"> Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" placeholder="" />
            </div>
          </div> 

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email" placeholder="" />
            </div>
          </div> 

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" placeholder="" />
            </div>
          </div> 

          

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Add Sub Admin</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection