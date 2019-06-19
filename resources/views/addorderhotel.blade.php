@extends('layouts.theme')
@section('content')
<div class="container">
    <div class="row content-justify-center">
            <table class="table table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Room No</th>
                        <th scope="col">Make Order</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $item)
                        <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>Room No : {{$item->RoomNo}}</td>
                                <td>
                                    <a href="{{url('hotelorder')}}/{{$item->id}}" class="btn btn-warning">Make Orders</a>
                                    <a href="{{url('hotelkotprint')}}/{{$item->id}}" class="btn btn-danger">Print Bill</a>
                                </td>
                                    
                              </tr>
                        @endforeach
                     
                    </tbody>
                  </table>
    </div>
</div>
@endsection