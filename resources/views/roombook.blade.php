@extends('layouts.theme')
@section('content')
<div class="container-fluid">
        @if ( session()->has('success') )
        <p class="alert alert-success">
                     {{ session()->get('success') }}
                  </p>
               @endif
        
              
              <room-availibility></room-availibility>
              <event-availibility></event-availibility>
              
                  {{-- <div class="container">
                        
                  </div> --}}
</div>

@endsection