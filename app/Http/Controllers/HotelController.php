<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function addnewroom(Request $request){
        $time = \Carbon\Carbon::now()->toDateTimeString();
        $room = DB::table('hotel_rooms')->insert([
                'RoomNo'=>$request->number,
                'RoomType'=>$request->category,
                'RoomPrice'=>$request->price,
                'created_at'=>$time,
                'updated_at'=>$time,
        ]);
        return redirect()->back()->with('success','Room Added Successfully');
    }
    public function getavailable(){//check for today
        $rooms = DB::table('hotel_rooms')->get();
        return view('roomscheck',compact('rooms'));
    }
    public function addcustomer(Request $request){
        $time = \Carbon\Carbon::now()->toDateTimeString();
        $checkin = \Carbon\Carbon::now()->toDateString();
        $customer=DB::table('hotel_customers')->insert([
            'Name'=>$request->name,
            'Address'=>$request->address,
            'Phone'=>$request->phone,
            'Members'=>$request->members,
            'Staying'=>$request->stay,
            'Checkin_date'=>$request->checkindate,
            'Checkout_date'=>$request->checkoutdate,
            'created_at'=>$time,
            'updated_at'=>$time,
        ]);
        return redirect()->back()->with('success','Customer Added Successfully');
    }
    public function getcustomers(){
        $customer=DB::table('hotel_customers')->where('status',1)->get();
        return response()->json($customer);
    }
    public function getvacantrooms($id){
        $rooms = DB::table('hotel_rooms')->where('Engaged',0)->get();
        $customer=DB::table('hotel_customers')->where('id',$id)->get();
        return view('addtoroom',compact('customer'));
    }
    public function getvacantroom(){
        $room = DB::table('hotel_rooms')->where('Engaged',0)->get();
        return response()->json($room);
    }
    public function addcustomertoroom(Request $request){
        $time = \Carbon\Carbon::now()->toDateTimeString();
        $date = \Carbon\Carbon::now()->toDateString();
        $add = DB::table('hotel_bookings')->insert([
            'CustomerId'=>$request->customerid,
            'RoomNo'=>$request->roomno,
            'Status'=>1,
            'Members'=>$request->members,
            'StayDuration'=>$request->staying,
            'CheckInDate'=>$date,
            'Created_at'=>$time,
            'Updated_at'=>$time,
        ]);
        return redirect('bookingdetails');
    }
    public function getcustomerfulldetails($id){
        $details = DB::table('hotel_customers')->where('id',$id)->get();

        return response()->json($details);
    }
    public function updateroomstatus($id){
        $details = DB::table('hotel_rooms')->where('id',$id)->update([
            'Engaged'=>1
        ]);
    }
    public function getrommslisted(){
        $rooms = DB::table('hotel_rooms')->where('Engaged',1)->get();
        return view('addorderhotel',compact('rooms'));
    }
    public function addorderhotel(Request $request){
        $time = \Carbon\Carbon::now()->toDateTimeString();
        $rand = rand(100000,999999);
        $order = DB::table('hotel_orders')->insert([
            'RoomNo'=>$request->id,
            'OrderNo'=>$rand,
            'Status'=>1,
            'created_at'=>$time,
            'updated_at'=>$time,
        ]);

        return response()->json($order);
    }
    public function ordersforhotel($id){
        $orders = DB::table('hotel_order_items')->where('RoomNo',$id)->get();
        return response()->json($orders);
    }
    public function additemtoorder(Request $request,$id){
        $time = \Carbon\Carbon::now()->toDateTimeString();
        $item=DB::table('hotel_order_items')->insert([
            'OrderNo'=>$request->orderno,
            'RoomNo'=>$request->roomno,
            'itemid'=>$request->id,
            'itemname'=>$request->name,
            'itemqnty'=>$request->amount,
            'amount'=>$request->value,
            'created_at'=>$time,
            'updated_at'=>$time,
        ]);
        return response()->json($item);
    }
    public function getdetailsorder($id){
        $order = DB::table('hotel_orders')->where('roomno',$id)->get();
        
        return response()->json($order);
    }
    public function getdetailsoforder($id){
        $order = DB::table('hotel_orders')->where('RoomNo',$id)->where('Status',1)->get();

        return response()->json($order);
    }
    public function getitemsinorder($id){
        $order = DB::table('hotel_order_items')->where('RoomNo',$id)->get();

        return view('hotelorder',compact('order'));

    }
    public function getroombydates($id){
        $rooms = DB::table('hotel_availables')->where('date',$id)->orWhere('checkoutdate',$id)->get();
        return response()->json($rooms);
    }
    public function getnotif(){
        $notifs = DB::table('hotel_requests')->orderBy('created_at','desc')->get();

        return response()->json($notifs);
    }
    public function updatenotifications(){
        $update = DB::table('hotel_requests')->where('status',1)->update([
            'status'=>0
        ]);
        return response()->json($update);   
    }
    public function vacanttable($id){
        $update = DB::table('tables')->where('tableno',$id)->update([
            'available'=>1
            ]);
        return response()->json($update);
    }
    public function gethotelrooms(){
        $rooms = DB::table('hotel_rooms')->where('engaged',0)->get();
        
        return response()->json($rooms);
    }
    public function BookRoom(Request $request){
        $time = \Carbon\Carbon::now()->toDateTimeString();
        $insert = DB::table('hotel_bookings')->insert([
            'CustomerId'=>$request->name,
            'RoomNo'=>$request->roomno,
            'Members'=>$request->members,
            'Status'=>1,
            'CheckInDate'=>$request->checkin,
            'CheckOutDate'=>$request->checkout,
            'StayDuration'=>$request->duration,
            'created_at'=>$time,
            'updated_at'=>$time,
        ]);
        $onto =DB::table('hotel_availables')->insert([
            'date'=>$request->checkin,
            'roomno'=>$request->roomno,
            'checkoutdate'=>$request->checkout,
            'created_at'=>$time,
            'updated_at'=>$time,
        ]);

        return response()->json($insert);
    }
    public function getbookingdetails(){
        $data = DB::table('hotel_bookings')->where('status',1)->get();
        return view('roomcheckout',compact('data'));
    }
    public function GetDetails($id){
        $data = DB::table('hotel_bookings')->where('id',$id)->get();
        return response()->json($data);
    }
    public function GetCustomerDetails($id){
        $data = DB::table('hotel_customers')->where('id',$id)->where('status',1)->get();
        return response()->json($data);
    }
    public function getroomdetails($id){
        $data = DB::table('hotel_rooms')->where('RoomNo',$id)->get();
        return response()->json($data);
    }
    public function clearbooking($id){
        $data = DB::table('hotel_bookings')->where('CustomerId',$id)->update([
            'Status'=>0
        ]);
        
    }
    public function clearcustomer($id){
        $data = DB::table('hotel_customers')->where('id',$id)->update(['status'=>0]);
        
    }

}