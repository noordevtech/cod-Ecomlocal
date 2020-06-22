<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use View;
use Session;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(\Illuminate\Http\Request $request){
        $this->middleware('auth');
        $this->request = $request;
    }
    
    public function browse(){
        $this->middleware('auth', ['except' => ['add'] ]);
        $orders = DB::table( 'orders' )->orderBy('order_id', 'desc')->where('is_deleted', '=', 0)->get();
        return View::make( 'pages.orders' , compact( 'orders' ));
    }
    
    public function search(Request $request){
        $keyword = $this->request->get('q');
        $this->middleware('auth', ['except' => ['add'] ]);
        $orders = DB::table( 'orders' )->
            orderBy('order_id', 'desc')
            ->where('order_id', 'like', '%'.$keyword.'%')
            ->orWhere('first_name', 'like', '%'.$keyword.'%')
            ->orWhere('city', 'like', '%'.$keyword.'%')
            ->orWhere('phone_number', '=', $keyword)
            ->orWhere('address', 'like', '%'.$keyword.'%')
            ->orWhere('product_name', 'like', '%'.$keyword.'%')
            ->get();
        return View::make( 'pages.orders' , compact( 'orders' ));
    }
    
    public function add(Request $request){
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
    }
    
    public function delete($order_id){
        $delete = DB::table('orders')
            ->where('order_id', '=', $order_id)
            ->update([
                'is_deleted' => 1
            ]);
        if($delete){ Session::flash('message', 'Orders Number '.$order_id.' has been deleted'); }else{
            Session::flash('error', 'An Error occured!'); }   
        return redirect('/');
    }
    
    public function browse_fulfilled(){
        $this->middleware('auth');
        $orders = DB::table( 'orders' )->orderBy('order_id', 'desc')->where('status', '=', 1)->get();
        return View::make( 'pages.orders' , compact( 'orders' ));
    }
    
    public function browse_unfulfilled(){
        $this->middleware('auth');
        $orders = DB::table( 'orders' )->orderBy('order_id', 'desc')->where('status', '=', 0)->get();
        return View::make( 'pages.orders' , compact( 'orders' ));
    }
    
    public function mark_as_fulfilled($order_id){
        $update = DB::table('orders')
            ->where('order_id', '=', $order_id)
            ->update([
                'status' => 1
            ]);
        if($update){ Session::flash('message', 'Order '.$order_id.' has been marked as fulfilled'); }else{
        Session::flash('error', 'An Error occured!'); }   
        return redirect('/');
    }
    
    public function mark_as_unfulfilled($order_id){
        $update = DB::table('orders')
            ->where('order_id', '=', $order_id)
            ->update([
                'status' => 0
            ]);
        if($update){ Session::flash('message', 'Order '.$order_id.' has been marked as unfulfilled'); }else{
            Session::flash('error', 'An Error occured!'); }   
        return redirect('/');
    }
    
    public function trash(){
        $this->middleware('auth');
        $orders = DB::table( 'orders' )->orderBy('order_id', 'desc')->where('is_deleted', '=', 1)->get();
        return View::make( 'pages.trash' , compact( 'orders' ));
    }
    
    public function bulkdelete(Request $request){
        $orders_list = $this->request->input( 'orders' );
        $orders = explode(',' , $orders_list);
        foreach($orders as $order_id){
            $update = DB::table('orders')
                ->where('order_id', '=', $order_id)
                ->update([
                    'is_deleted' => 1
                ]);
            
        }
        if($update){ Session::flash('message', 'Orders Number '.$orders_list.' have been deleted'); }else{
            Session::flash('error', 'An Error occured!'); }   
            return redirect('/');
    }
    
    public function restore($order_id){
        $delete = DB::table('orders')
            ->where('order_id', '=', $order_id)
            ->update([
                'is_deleted' => 0
            ]);
        if($delete){ Session::flash('message', 'Orders Number '.$order_id.' has been deleted'); }else{
            Session::flash('error', 'An Error occured!'); }   
        return redirect('/order/trash');
    }
    
    public function destroy($order_id){
        $delete = DB::table('orders')
            ->where('order_id', '=', $order_id)
            ->update([
                'is_deleted' => 3
            ]);
        if($delete){ Session::flash('message', 'Orders Number '.$order_id.' has been deleted'); }else{
            Session::flash('error', 'An Error occured!'); }   
        return redirect('/order/trash');
    }
    
    public function download(){
        $orders = $this->request->input('orders');
        $orders = explode(',', $orders);
        
        $csvString  = array();
        $temp = tmpfile();
        
        $orders_pointer = [ 'Order Id', 'First name', 'Last name', 'Phone number', 'Adress' , 'City' , 'Ordered Item', 'Item URL', 'Price',  'Variants', 'Quantity', 'Date' ];
        
        $fp = fopen('php://temp', 'w+');
        
        fputcsv($temp, $orders_pointer );
        
        foreach($orders as $order_id){
            
            $orders = DB::table( 'orders' )->orderBy('order_id', 'desc')->where('order_id', '=', $order_id)->get();
            
            foreach( $orders as $o ){
                $selected_order = [
                            $o->order_id , 
                            $o->first_name , 
                            $o->last_name , 
                            $o->phone_number , 
                            $o->address , 
                            $o->city , 
                            $o->product_name , 
                            'https://wisoo.ma/'.$o->product_url , 
                            $o->product_price , 
                            $o->variants , 
                            $o->quantity , 
                            $o->date
                        ];
                fputcsv( $temp, $selected_order);
                $merged_orders = array_merge( $orders_pointer, $selected_order );
            }
            
        }
        fseek($temp, 0);
        
        $out_size = strlen(implode(',', $merged_orders));
        header("Content-Length: $out_size");
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=Export.csv");
        echo fread($temp, 1024);

    }
    
}
