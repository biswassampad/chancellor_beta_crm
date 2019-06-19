@extends('layouts.theme')
@section('content')
<div class="container">
    <div class="row">
        <h2>Booking Room For :{{ucwords($customer[0]->Name)}}</h2>
    </div>
    <list-room></list-room>
</div>

@endsection