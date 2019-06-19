<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function addEvntHall(Request $request){
        $time = \Carbon\Carbon::now()->toDateTimeString();
        $hall = DB::table('event_halls')->insert([
            'type'=>$request->type,
            'maxcapacity'=>$request->max,
            'mincapacity'=>$request->min,
            'price'=>$request->price,
            'status'=>1,
            'created_at'=>$time,
            'updated_at'=>$time,
        ]);
        return redirect()->back()->with('success','Event Hall Added Successfully');
    }
    public function addcat(Request $request){
        $time = \Carbon\Carbon::now()->toDateTimeString();
        $cat = DB::table('event_packages')->insert([
            'PackageName'=>$request->name,
            'vnv'=>$request->vnv,
            'Price'=>$request->price,
            'PackageDetails'=>$request->about,
        ]);
        return redirect()->back()->with('success','Event Category Added Successfully');
    }
    public function eventcustomer(){
        $customers = DB::table('event_customers')->where('status',1)->get();

        return view('eventcustomer',compact('customers'));
    }
    public function addcustomer(Request $request){
        $time = \Carbon\Carbon::now()->toDateTimeString();
        $rand = rand(100000,999999);
        $customer=DB::table('event_customers')->insert([
            'name'=>$request->name,
            'address'=>$request->address,
            'eventno'=>$rand,
            'mobile'=>$request->mobile,
            'status'=>1,
            'created_at'=>$time,
            'updated_at'=>$time
        ]);
        return redirect()->back()->with('success','Event Customer Added Successfully');
    }
  public function geteventsbydates($id){
      $events = DB::table('event_availables')->where('date',$id)->get();

      return response()->json($events);
  }
  public function addevent(){
      $events = DB::table('event_details')->insert([

      ]);
  }
  public function geteventhalls(){
      $halls = DB::table('event_halls')->get();
      return response()->json($halls);
  }
  public function getcatgoriesveg(){
      $categories = DB::table('event_packages')->where('vnv',1)->get();
      return response()->json($categories);
  }
  
  public function getcatgoriesnveg(){
    $categories = DB::table('event_packages')->where('vnv',2)->get();
    return response()->json($categories);
}
 public function geteventnumber($id){
     $eventno = DB::table('event_customers')->where('id',$id)->get('eventno');

     return response()->json($eventno);
 } 
 public function addeventdetails(Request $request){
    $time = \Carbon\Carbon::now()->toDateTimeString();
     $insert = DB::table('event_details')->insert([
        'eventno'=>$request->eventno,
        'purpose'=>$request->purpose,
        'bookingdate'=>$request->date,
        'guests'=>$request->guests,
        'hall'=>$request->hall,
        'package'=>$request->package,
        'status'=>1,
        'created_at'=>$time,
        'updated_at'=>$time,
     ]);
     return response()->json($insert);
 }
 public function getnotif(){
     $notifs = DB::table('event_requests')->orderBy('created_at','DESC')->get();
     return response()->json($notifs);
 }
 public function readnotif(){
     $read = DB::table('event_requests')->where('status',1)->update(['status'=>0]);
     return response()->json($read);
 }
}

