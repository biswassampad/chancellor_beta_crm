<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;


class NotificationController extends Controller
{
    public function getrequestshotel(){
        $requests = DB::table('hotel_requests')->where('status',1)->get();

        return response()->json($requests);
    }
    
    public function getrequestsevent(){
        $requests = DB::table('event_requests')->where('status',1)->get();

        return response()->json($requests);
    }
    public function getcontacts(){
        $requests = DB::table('contacts')->orderBy('created_at','DESC')->get();
        return response()->json($requests);
    }
    public function readcontact(){
        $read = DB::table('contacts')->where('status',1)->update(['status'=>0]);
        return response()->json($read);
    }
    public function contactcount(){
        $read = DB::table('contacts')->where('status',1)->get();
        return response()->json($read);
    }
}
