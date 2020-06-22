<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get( 'auth/login'                    , 'Auth\AuthController@getLogin');

Route::post( 'auth/login'                   , 'Auth\AuthController@postLogin');

Route::get( 'auth/logout'                   , 'Auth\AuthController@getLogout');

Route::get( '/'                             , 'orderController@browse');

Route::post( '/order/add'                   , function( Request $request ) {
    $first_name         = Request::input( 'first_name' );
    $last_name          = Request::input( 'last_name' );
    $phone_number       = Request::input( 'phone_number' );
    $address            = Request::input( 'address' );
    $city               = Request::input( 'city' );
    $product_name       = Request::input( 'product_name' );
    $product_url        = Request::input( 'product_url' );
    $product_price      = Request::input( 'price' );
    $variants           = Request::input( 'variants' );
    $quantity           = Request::input( 'quantity' );
    
    $insert = DB::table('orders')->insert([
        'first_name' => $first_name,
        'last_name' => $last_name,
        'phone_number' => $phone_number,
        'address' => $address,
        'city' => $city,
        'product_name' => $product_name,
        'product_url' => $product_url,
        'product_price' => $product_price,
        'variants' => str_replace( '/undefined' , '' , $variants),
        'quantity' => $quantity,
        'date' => date('Y-m-d H:i:s'),
        'is_deleted' => 0
    ]);
    
    $message_body = "Hi Reda
    New Order placed.
    Full name : $first_name $last_name
    Phone number : $phone_number
    address : $address
    city : $city
    product ordered : $product_name - $variants
    quantity : $quantity
    date : ".date('Y-m-d H:i:s');

    if ( $insert ) {
        echo "1";
    }else{
        echo "0";
    }
});

Route::get( '/order/search'                 , 'orderController@search');

Route::post( '/order/download'              , 'orderController@download') ;

Route::get('/order/trash'                   , 'orderController@trash');

Route::get('/order/fulfilled'               , 'orderController@browse_fulfilled');

Route::get('/order/unfulfilled'             , 'orderController@browse_unfulfilled');

Route::get( '/order/delete/{order_id}'      , 'orderController@delete');

Route::get( '/order/restore/{order_id}'     , 'orderController@restore');

Route::get( '/order/destroy/{order_id}'     , 'orderController@destroy');

Route::get( '/order/fulfill/{order_id}'     , 'orderController@mark_as_fulfilled' );

Route::get( '/order/unfulfill/{order_id}'   , 'orderController@mark_as_unfulfilled' );

Route::post( '/order/bulkdelete'            , 'orderController@bulkdelete' );