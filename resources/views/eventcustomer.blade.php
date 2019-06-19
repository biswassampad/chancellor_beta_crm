@extends('layouts.theme')
@section('content')
<div class="container">
    <div class="row justify-content-center">
            @if ( session()->has('success') )
            <p class="alert alert-success">
                         {{ session()->get('success') }}
                      </p>
                   @endif
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Customer</button>
            <!--Modal Begins-->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                 <div class="container">
                     <div class="row justify-content-center">
                        <div class="col-md-12">
                                <h3>Add Customer</h3>
                        <form action="{{url('addeventcustomer')}}" class="col-md-12" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Customer Name</label>
                                <input type="text" name="name" class="form-control" placeholder="John Doe">
                            </div>
                            <div class="form-group">
                                    <label for="address">Customer Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Cutomer Address">
                                </div>
                                <div class="form-group">
                                        <label for="mobile">Customer Mobile</label>
                                        <input type="text" name="mobile" class="form-control" placeholder="Cutomer Mobile Number">
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-warning">Add User</button>        
                                    </div>
                        </form>
                        </div>
                     </div>
                 </div>
                </div>
              </div>
            </div>
            <!--Modal Ends-->
            @if(count($customers)==0)
            <div class="col-md-12">
              <div class="col-md-6 offset-4 nodata">
               <span class="emoji"> ¯\_(ツ)_/¯<span><br>
                <span>No Records Found,Please add customers</span>
              </div>
                        
            </div>
            @endif
            @if(count($customers)>0)
            <div class="col-md-12">
                    <table class="table table-striped table-hover table-dark">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $item)
                          <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->mobile}}</td>
                            <td>
                                <a href="{{ url('bookevent')}}/{{$item->id}}" class="btn btn-success">Book Event</a>
                                <a href="{{ url('billevent')}}/{{$item->id}}" class="btn btn-success">Bill Event</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
            </div>
            @endif
    </div>
</div>
@endsection