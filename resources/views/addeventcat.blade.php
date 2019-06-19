@extends('layouts.theme')
@section('content')
<div class="container">
        <div class="container">
                @if ( session()->has('success') )
                <p class="alert alert-success">
                             {{ session()->get('success') }}
                          </p>
                       @endif
    <div class="row">
        <form action="{{url('addpackage')}}" class="col-md-8" method="POST">
            @csrf
        <div class="form-group">
            <label for="halltype">Catagory Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Category Name">
        </div>
        <div class="form-group">
            <label for="halltype">Veg/Non Veg</label>
            <select class="form-control" name="vnv">
                <option value="1">Veg</option>
                <option value="2">Non Veg</option>
            </select>
        </div>
        <div class="form-group">
            <label for="halltype">Price per plate</label>
            <input type="text" class="form-control" name="price" placeholder="Price per plate">
        </div>
        <div class="form-group">
            <label for="halltype">About the package</label>
            <textarea  class="form-control" name="about" placeholder="Package Description"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </form>
    </div>
</div>
@endsection