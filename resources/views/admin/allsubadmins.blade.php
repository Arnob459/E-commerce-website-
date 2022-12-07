@extends('admin.layouts.template')
@section('page_title')
    All SubAdmins - Marketiah
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Sub Admin</h4>

        <div class="card">
            <h5 class="card-header">Available Sub-Admins Information</h5>
            @if (session()->has('message'))
            <div class="alert alert-success">
              {{(session()->get('message'))}}
            </div>
                
            @endif
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($subadmins as $subadmin)                
                    <tr>
                      <td>{{$subadmin->name}}</td>
                      <td>{{$subadmin->email}}</td>
                      <td>
                        <a href="{{ route('editsubadmin', $subadmin->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('deletesubadmin', $subadmin->id) }}" class="btn btn-danger">Delete</a>

                      </td>
                    </tr> 
                  @endforeach                   
                </tbody>
              </table>
            </div>
          </div>
    </div>
@endsection