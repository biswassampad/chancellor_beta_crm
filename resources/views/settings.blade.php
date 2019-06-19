@extends('layouts.theme')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col">Add & Edit Food Items</th>
                <th scope="col">
                 <a href="{{url('additem')}}" class="btn btn-success">Add Item</a>
                </th>
                <th scope="col">
                    <a href="{{url('edititem')}}" class="btn btn-warning">Item List & Edit</a>
                 </th>
              </tr>
              </thead>
              <thead>
                <tr>
                  <th scope="col">Add & Edit Hotel Rooms</th>
                  <th scope="col">
                   <a href="{{url('addroom')}}" class="btn btn-success">Add Room</a>
                  </th>
                  <th scope="col">
                      <a href="{{url('edititem')}}" class="btn btn-warning">Room List & Edit</a>
                   </th>
                </tr>
                </thead>
                <thead>
                    <tr>
                      <th scope="col">Add & Edit Resturant Tables</th>
                      <th scope="col">
                       <a href="{{url('addtable')}}" class="btn btn-success">Add Item</a>
                      </th>
                      <th scope="col">
                          <a href="{{url('getitems')}}" class="btn btn-warning">Item List & Edit</a>
                       </th>
                    </tr>
                    </thead>
                <thead>
                    <tr>
                      <th scope="col">Add & Edit Event Halls</th>
                      <th scope="col">
                       <a href="{{url('addhalls')}}" class="btn btn-success">Add Item</a>
                      </th>
                      <th scope="col">
                          <a href="{{url('getitems')}}" class="btn btn-warning">Item List & Edit</a>
                       </th>
                    </tr>
                    </thead>
                    <thead>
                        <tr>
                          <th scope="col">Add & Edit Event Food Category</th>
                          <th scope="col">
                           <a href="{{url('addeventcat')}}" class="btn btn-success">Add Item</a>
                          </th>
                          <th scope="col">
                              <a href="{{url('edititem')}}" class="btn btn-warning">Item List & Edit</a>
                           </th>
                        </tr>
                        </thead>
                        <thead>
                            <tr>
                              <th scope="col">Add & Edit Cashiers</th>
                              <th scope="col">
                               <a href="{{url('adduser')}}" class="btn btn-success">Add Item</a>
                              </th>
                              <th scope="col">
                                  <a href="{{url('edititem')}}" class="btn btn-warning">Item List & Edit</a>
                               </th>
                            </tr>
                            </thead>
    </div>
</div>
@endsection