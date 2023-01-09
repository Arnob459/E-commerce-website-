@extends('user_template.layouts.template')
@section('main-content')
<h2>Provide Your Shipping Information</h2>
<div class="row">
    <div class="col-12">
        <div class="box_main">
            <form action="{{ route('addshippinginfo') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number">
                </div>
                <div class="form-group">
                    <label for="city_name">City/Village Name</label>
                    <input type="text" class="form-control" name="city_name">
                </div>
                <div class="form-group">
                    <label for="area">Area</label>
                    <input type="text" class="form-control" name="area">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address">
                </div>
                <input type="submit" value="next" class="btn btn-primary">

            </form>
        </div>
    </div>
</div>
@endsection