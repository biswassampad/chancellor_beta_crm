@extends('layouts.theme')

@section('content')

    <div class="row justify-content-center">
        <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front first-front">
                  <h3 class="card-title">Resturant Orders</h3>
              </div>
              <div class="flip-card-back first-back">
                <h4>Add Orders</h4>
                <h4>Add Customers</h4>
                <a href="{{ url('addorderres')}}" class="btn btn-warning dashboard-button">Go</a>
              </div>
            </div>
          </div>
          <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front res-front">
                    <h3 class="card-title">Hotel Orders</h3>
                </div>
                <div class="flip-card-back res-back">
                  <h4>Add Orders</h4>
                  <h4>Add Customers</h4>
                  <a href="{{ url('addorderhotel')}}" class="btn btn-primary dashboard-button">Go somewhere</a>
                </div>
              </div>
            </div>
              <div class="flip-card">
                  <div class="flip-card-inner">
                    <div class="flip-card-front avail-front">
                        <h3 class="card-title">Check Availibility</h3>
                    </div>
                    <div class="flip-card-back avail-back">
                      <h4>Check Rooms Availibility</h4>
                      <h4>Check Events Availibility</h4>
                      <a href="{{ url('roombook')}}" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="flip-card">
                    <div class="flip-card-inner">
                      <div class="flip-card-front room-front">
                          <h3 class="card-title">Book Room</h3>
                      </div>
                      <div class="flip-card-back room-back">
                        <h4>Book Rooms</h4>
                        <h4>Add Rooms Customers</h4>
                        <a href="{{ url('roomscheck')}}" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                  <div class="flip-card">
                      <div class="flip-card-inner">
                        <div class="flip-card-front lodge-front">
                            <h3 class="card-title">Hotel CheckOut</h3>
                        </div>
                        <div class="flip-card-back lodge-back">
                          <h4>Check Out</h4>
                          <h4>Hotel Customers</h4>
                          <a href="{{ url('roomcheckout')}}" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                    </div>
                    <div class="flip-card">
                        <div class="flip-card-inner">
                          <div class="flip-card-front event-front">
                              <h3 class="card-title">Events</h3>
                          </div>
                          <div class="flip-card-back event-back">
                            <h4>Add Event Customer</h4>
                            <h4>Book Events</h4>
                            <a href="{{ url('eventcustomer')}}" class="btn btn-primary">Go somewhere</a>
                          </div>
                        </div>
                      </div>
          @if(Auth::user()->role==1)
          <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front set-front">
                    <h3 class="card-title">Settings</h3>
                </div>
                <div class="flip-card-back set-back">
                  <h4>Admin Settings</h4>
                  <h4>Users & Management</h4>
                  <a href="{{ url('settings')}}" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>

            <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="flip-card-front report-front">
                      <h3 class="card-title">Reports</h3>
                  </div>
                  <div class="flip-card-back report-back">
                    <h4>Daily Reports</h4>
                    <h4>Sales Report</h4>
                    <a href="{{ url('reports')}}" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
          @endif
</div>
</div>
@endsection
