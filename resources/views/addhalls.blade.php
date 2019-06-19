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
        <form action="{{url('addhall')}}" class="col-md-8" method="POST">
            @csrf
        <div class="form-group">
            <label for="halltype">Hall Type</label>
            <input type="text" class="form-control" name="type" placeholder="Enter hall type..">
        </div>
        <div class="form-group">
            <label for="halltype">Maximun Capacity</label>
            <input type="text" class="form-control" name="max" placeholder="Enter Maximum Capacity..">
        </div>
        <div class="form-group">
            <label for="halltype">Minimum Capacity</label>
            <input type="text" class="form-control" name="min" placeholder="Enter minimum capacity..">
        </div>
        <div class="form-group">
            <label for="halltype">Price</label>
            <input type="text" class="form-control" name="price" placeholder="Enter hall price..">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </form>
    </div>
</div>
@endsection