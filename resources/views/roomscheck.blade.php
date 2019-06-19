@extends('layouts.theme')
@section('content')
<div class="container-fluid">
        <nav class="navbar navbar-light bg-light">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Customer</button>
                <a href="{{url('bookroom')}}" class="btn btn-warning">Book Room</a>
              </nav>
              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="container">
                                <form method="POST" action="{{url('addcustomer')}}">
                                        @csrf
                                            <div class="form-group">
                                             <label for="customername">Customer Name</label>
                                                <input type="text"  class="form-control" id="customername" placeholder="John Doe" name="name">
                                            </div>
                                            
                                            <div class="form-group">
                                             <label for="customername">Customer Mobile</label>
                                                <input type="phone"  class="form-control" id="customername" placeholder="1234567890" name="phone">
                                            </div>
                                            <div class="form-group">
                                                    <label for="customername">Customer Address</label>
                                                       <input type="text"  class="form-control" id="customername" placeholder="At-/Po-/Dist-/State-" name="address">
                                            </div>
                                            <div class="form-group">
                                                    <label for="customername">Members</label>
                                                       <input type="text"  class="form-control" id="customername" placeholder="memebers" name="members">
                                            </div>
                                            <div class="form-group">
                                                    <label for="customername">Staying Days</label>
                                                       <input type="text"  class="form-control" id="customername" placeholder="How many days ..." name="stay">
                                            </div> 
                                            <div class="form-group">
                                                    <label for="customername">CheckIn Date</label>
                                                       <input type="date"  class="form-control" id="customername" placeholder="Check Out Date" name="checkindate">
                                            </div>       
                                            <div class="form-group">
                                                    <label for="customername">CheckOut Date</label>
                                                       <input type="date"  class="form-control" id="customername" placeholder="Check Out Date" name="checkoutdate">
                                            </div>   
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success">Add & Proceed</button>
                                                    </div>
                                            </form>
                          </div>
                            
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                        <hotel-customer></hotel-customer>
                  </div>
    
</div>

@endsection