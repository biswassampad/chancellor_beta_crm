<?php

namespace App\Http\Controllers\Api;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResturantController extends Controller
{
    public function getMenuOnly(){
        $menu = DB::table('items')->get();

        return response()->json($menu);
    }
    public function bookTheTable(Request $request){
        $time = \Carbon\Carbon::now()->toDateTimeString();
        
        $book = DB::table('booked_tables')->insert([
            'customer_id'=>$request->customerid,
            'customer_name'=>$request->customername,
            'table_no'=>$request->table,
            'date'=>$request->date,
            'strength'=>$request->strength,
            'time'=>$request->time,
            'created_at'=>$time,
            'updated_at'=>$time,
        ]);
        
        return response()->json($book);
    }
    public function getTableOfUser($id){
        $table = DB::table('booked_tables')->where('customer_id',$id)->first();

        return response()->json($table);
    }
    public function getBookingList($id)
    {   
        $time = \Carbon\Carbon::now()->toDateString();
        $list = DB::table('booked_tables')->where('date',$id)->get();
        return response()->json($list);
    }
    public function getOrderDetails($id){
        $data = DB::table('booked_tables')->where('id',$id)->get();

        return response()->json($data);
    }
    public function createToken(Request $request){
        $rand = rand(10000,999999);
        $time =   $time = \Carbon\Carbon::now()->toDateTimeString();
        $data = DB::table('resorders')->insert([
            'orderno'=>$rand,
            'name'=>$request->name,
            'tableno'=>$request->tableno,
            'customer_id'=>$request->customer_id,
            'booking_id'=>$request->bookingno,
            'members'=>$request->members,
            'status'=>$request->status,
            'created_at'=>$time,
            'updated_at'=>$time,
        ]);
        
        return response()->json(200);
    }

    public function getOrderNo($id){
        $data = DB::table('resorders')->where('booking_id',$id)->first();
        
        return response()->json($data);
    }
    public function getbookingno($id){
        $data = DB::table('booked_tables')->where('customer_id',$id)->get();

        return response()->json($data);
    }
    public function getIds($id){
        $data = DB::table('resorders')->where('customer_id',$id)->first();

        return response()->json($data);
    }
    public function updateBookingStatus($id){
            $data =  DB::table('booked_tables')->where('booking_id',$id)->update([
                'status'=>1
            ]);

            return response()->json($data);
    }
    public function addToOrder(Request $request,$id){
        $time =   $time = \Carbon\Carbon::now()->toDateTimeString();
      
        $data =  DB::table('resoitems')->where('orderId',$id)->where('itemid',$request->itemid)->first();
        if($data){
            $update = DB::table('resoitems')->where('orderId',$id)->where('itemid',$request->itemid)->update([
                'itemqnty'=>$request->itemqnty,
                'updated_at'=>$time,
            ]);

            return response()->json($update);
        }else{
            $data = DB::table('resoitems')->insert([
                'orderId'=>$request->orderid,
                'itemid'=>$request->itemid,
                'itemname'=>$request->itemname,
                'itemqnty'=>$request->itemqnty,
                'amount'=>$request->amount,
                'created_at'=>$time,
                'updated_at'=>$time,
                 ]);
                 return response()->json($data);
        }
    }

    public function checkItemInCart($id,$param){
        $result = DB::table('resoitems')->where('orderId',$id)->where('itemid',$param)->first();

        return response()->json($result);
    }
    public function getOrderItems($id){
        $items = DB::table('resoitems')->where('orderid',$id)->get();

        return response()->json($items);
    }
    public function getTableNo($id){
        $table = DB::table('resorders')->where('orderno',$id)->get();

        return response()->json($table);
    }
    public function genKot(Request $request,$id){
        $rand = rand(10000,999999);
        $time =   $time = \Carbon\Carbon::now()->toDateTimeString();
       $table= DB::table('kot')->where('order_no',$id)->first();
        if(!$table){
            $table = DB::table('kot')->insert([
                'kot_no'=>$rand,
                'order_no'=>$request->orderno,
                'table_no'=>$request->tableno,
                'created_at'=>$time,
                'updated_at'=>$time
            ]);
            return response()->json($table);
        }else{
            return response()->json('Token Already Generated!!');
        }
    }
    public function tokenDetails($id){
        $data = DB::table('kot')->where('order_no',$id)->get();

        return response()->json($data);
    }
    public function updateToken(Request $request,$id){
        $data = DB::table('kot')->where('order_no',$id)->update([
            'item_qnty'=>$request->amount,
        ]);

        return response()->json($data);
    }
    public function resetOrder(Request $request,$id){
        $data = DB::table('resorders')->where('orderno',$id)->update([])
    }
}
