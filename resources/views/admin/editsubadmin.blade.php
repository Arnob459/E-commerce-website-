@extends('admin.layouts.template')
@section('page_title')
    Edit Subadmin - Marketiah
@endsection
@section('content')
<!-- Basic Layout -->
<div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Edit Subadmin</h4>

    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit New Subadmin</h5>
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
            <form action="{{route('updatesubadmin')}}" method="POST">
              @csrf
              <input type="hidden" value="{{$subadmininfo->id}}" name="id">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name"> Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" value="{{($subadmininfo->name)}}" />
                </div>
              </div>
              
              
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name"> Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" value="{{($subadmininfo->email)}}" />
                </div>
              </div>  
              
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name"> Password</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="password" name="password" value="{{($subadmininfo->password)}}" />
                </div>
              </div> 
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Edit Sub-Admin</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection