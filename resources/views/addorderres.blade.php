@extends('layouts.theme')
@section('content')
<nav class="navbar navbar-light bg-light">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Add Customer
</button>
  </nav>
<div class="container">
    <div class="row justify-content-center">
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Add Customer For Table</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        <add-customer-res></add-customer-res>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
         
    </div>
    @if(count($tables)==0)
    <div class="col-md-12">
      <table class="table table-hover table-dark">
        <thead>
            <th scope="col">No Records Found Add Customer Please
               
            </th>
            <th scope="col">
                 <span>
                  ¯\_(ツ)_/¯
                   </span>
            </th>
        </thead>
      </table>
    </div>
    @endif
    @if(count($tables)>0)
    <div class="row">
            <table class="table table-striped table-hover table-dark">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Table No</th>
                    <th scope="col">Order No</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($tables as $table)
                  <tr>
                    <th scope="row">{{$table->id}}</th>
                    <td>{{$table->tableno}}</td>
                    <td>{{$table->orderno}}</td>
                    <td>{{$table->name}}</td>
                    <td><a href="{{ url('billkot')}}/{{$table->orderno}}" class="btn btn-success">Print Bill</a>
                        <a href="{{ url('additem2this')}}/{{$table->orderno}}" class="btn btn-warning">Add Items</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
    </div>
    @endif
</div>

@endsection