<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
Route::get('/home', 'HomeController@index')->name('home');//dashboard
Route::get('/addorderres',function(){
    return view('addorderres');//order page for resturant
});
Route::get('/addorderres','ResturantController@gettables');//to get tabl details
Route::get('/tableorder/{id}',function(){
    return view('tableorder');// table wise order details
});
Route::get('/additem',function(){
    return view('additem');// adding item to the tables
});
Route::post('/addtomenu','ResturantController@additemtomenu');// adding item to the menu
Route::get('/searchitems','ResturantController@searchitems');// search query for the resturant item menu
Route::get('/addtable',function(){
    return view('addtable');// add table to the resturant page
});
Route::post('/addtableid','ResturantController@addtable');// add table post request 
Route::get('/additem2this/{id}',function(){
    return view('additem2this'); // add items to this page with table id 
});
Route::get('/additem2this/{id}','ResturantController@getordered');// get orders table number wise may be a axios request  
Route::post('/searchitem','ResturantController@searchitem');//get searh items for hotel orders
Route::get('/printorders',function(){
    return view('listorder');//print page for resturant 
});
Route::get('/billkot/{id}',function(){
    return view('billkot');// bill
});
Route::get('/billkot/{id}','ResturantController@billget');// get bill by table id
Route::get('/billkot/tableno/{id}','ResturantController@getTableNumber');// get bill by table no
Route::get('billkot/inactive/{id}','ResturantController@inactiveOrder');// making table vacant for next order
Route::get('/settings',function(){
    return view('settings'); // settings page view 
});
Route::get('/addroom',function(){
    return view('addroom'); // add room page
});
Route::post('/addtoroom','HotelController@addnewroom');//post request for adding room
Route::get('/roomscheck',function(){
    return view('roomscheck');// check availability of the room date wise page 
});
Route::get('/roomscheck','HotelController@getavailable');// get rooms availability checkweb
Route::get('/roombook',function(){
    return view('roombook');// book room page
});
Route::get('/gethotelcustomers','HotelController@getcustomers');//booked unbooked rooms on page 
Route::post('/addcustomer','HotelController@addcustomer');// add guest for hotel post request
Route::get('/addtoroom/{id}',function(){
    return view('addtoroom');// assign room to guest
});
Route::get('/addtoroom/{id}','HotelController@getvacantrooms'); //get vacant rroom to assign the guest
Route::get('/getavailrooms','HotelController@getvacantroom');//get vacant rooms ajax
Route::post('/assignroomtocustomer/{id}','HotelController@addcustomertoroom');//assign room to a guest
Route::get('/bookingdetails',function(){
    return view('bookingdetails');//booking details page 
});
Route::get('/customerdetails/{id}','HotelController@getcustomerfulldetails');//get full customer details
Route::get('/updateroom/{id}','HotelController@updateroomstatus');//updating room status to engaged
Route::get('/addorderhotel',function(){
    return view('addorderhotel');//add food order for hotel page
});
Route::get('/addorderhotel','HotelController@getrommslisted');// add order to hotel post
Route::get('/hotelorder/{id}',function(){
    return view('hotelorder');// hotel orders page
});
Route::get('/hotelorder/{id}','HotelController@getitemsinorder');//hotel orders room number wise
Route::post('/adddorderhotel/{id}','HotelController@addorderhotel');//add order to hotel post
Route::get('/ordersforhotel/{id}','HotelController@ordersforhotel');//get order list as per hotel
Route::get('/orderdetails/{id}','HotelController@getdetailsorder');//order details as per room id 
Route::get('/getorderdetails/{id}','HotelController@getdetailsoforder');
Route::get('/adduser',function(){
    return view('adduser');//add cashier
});
Route::get('/adduser','SettingsController@getusers');//get user list 
Route::post('/addcashier','SettingsController@addcashier');//add cashier post
Route::get('/addhalls',function(){
    return view('addhalls');//add halls
});
Route::post('/addhall','EventController@addEvntHall');//add halls post
Route::get('/addeventcat',function(){
    return view('addeventcat');//add event category page 
});
Route::post('/addpackage','EventController@addcat');//add event package post 
Route::get('/eventcustomer',function(){
    return view('eventcustomer');//event customer page 
});
Route::get('/eventcustomer','EventController@eventcustomer');//get all event customer list 
Route::post('/addeventcustomer','EventController@addcustomer');//add event customer list 
Route::get('/bookevent/{id}',function(){
    return view('bookevent');//book event function 
});
Route::get('/eventhalls','EventController@eventhalls');//event halls details 
Route::get('/test',function(){
    return view('test');
});
Route::get('hrequests',function(){
    return view('hrequests');
});
Route::get('erequests',function(){
    return view('erequests');
});
Route::get('contacts',function(){
    return view('contacts');
});
Route::get('/bookroom',function(){
    return view('bookroom');
});
Route::get('/gethotelrooms','HotelController@gethotelrooms');
Route::get('/roomcheckout',function(){
    return view('roomcheckout');
});
Route::get('/roomcheckout','HotelController@getbookingdetails');
Route::get('/checkout/{id}',function(){
    return view('checkout');
});
Route::get('/delitemhotel/{id}','ResturantController@deleteItem');
});