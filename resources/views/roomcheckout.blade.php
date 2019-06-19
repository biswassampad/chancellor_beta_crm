@extends('layouts.theme')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
            <table class="table table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Room No</th>
                        <th scope="col">Members</th>
                        <th scope="col">Check In</th>
                        <th scope="col">Check Out</th>
                        <th scope="col">Stay Duration</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                      <tr>
                        <th scope="row">{{$item->CustomerId}}</th>
                        <td>{{$item->RoomNo}}</td>
                        <td>{{$item->Members}}</td>
                        <td>{{$item->CheckInDate}}</td>
                        <td>{{$item->CheckOutDate}}</td>
                        <td>{{$item->StayDuration}}</td>
                        <td><a href="{{url('checkout')}}/{{$item->id}}" class="btn btn-success">Print</a></td>
                      </tr>
                      @endforeach
                      </tbody>
                  </table>
    </div>
</div>
@endsection