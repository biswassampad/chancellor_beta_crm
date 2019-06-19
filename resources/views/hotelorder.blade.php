@extends('layouts.theme')
@section('content')
<div class="conatiner">
    <div class="row">
        <hotel-orderlist></hotel-orderlist>
        <div class="container">
                <table class="table table-hover table-dark">
                        <thead>
                          <tr>
                            
                            <th scope="col">Item Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $item)
                          <tr>
                            <td>{{$item->ItemName}}</td>
                            <td>{{$item->ItemQnty}}</td>
                            <td>{{$item->amount}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
        </div>
        
</div>
<button class="btn btn-success">Confirm & Generate KOT</button>
</div>
</div>

@endsection