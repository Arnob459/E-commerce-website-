@extends('user_template.layouts.user_profile_template')
@section('profile-content')
<h2>Add Product to cart</h2>
@if (session()->has('message'))
<div class="alert alert-success">
  {{(session()->get('message'))}}
</div>
    
@endif
@endsection
