<?php 
namespace App\Http\Middleware;

use Closure;

class cors
{
    /**
     * Handle all incoming request.
     * 
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed 
     * */

     public function handle($request, Closure $next)
     {
         header("Access-Control-Allow-Origin: *");
         //Allow options method
         $headers = [
             'Access-Control-Allow-Methods'=>'POST,GET,OPTIONS,PATCH,PUT,DELETE',
             'Access-control-Allow-Headers'=>'Content-Type,X-Auth-Token,Origin,Authorization',
         ];
         if($request->getMethod() == "OPTIONS"){
             //The client side application can set only headers allowed in Access-Control-Allow-Headers
             return response()->json('OK',200,$headers);
         }
         $response = $next($request);
         foreach($headers as $key=>$value){
             $response->header($key,$value);
         }
         return $response;
     }
}