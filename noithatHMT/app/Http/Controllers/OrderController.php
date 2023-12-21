<?php

namespace App\Http\Controllers;

use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;
use function Laravel\Prompts\table;

class OrderController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $order = DB::table('order')
            ->join("users" ,"users.id","=","order.id_user")
            ->join("shipping", "shipping.id","=","order.id_shipping")
            ->select("order.*","users.name","users.phone","users.address","shipping.shipping_name")
            ->where('users.id','=',$id)
            ->orderBy('order_date','desc')
            ->orderBy('order_status','asc')
            ->get();
        return view("home/order/list",["order"=>$order]);
    }
    public function checkout(){
        $id = Auth::user()->id;
        $status = 1;
        $date = date('Y-m-d H:');
        $shipping = 1;
        DB::table('order')->insert([
            'id_user' => $id,
            'order_status' => $status,
            'order_date' => $date,
            'id_shipping' => $shipping
        ]);
        $id_orders = DB::table('order')->select(
            DB::raw('max(id) as id_order'))
            ->where('id_user' ,'=',$id)
            ->get();

        foreach($id_orders as $id_order){
            $id_order_detail =$id_order->id_order;
        }
        $carts =  session()->get('cart');
        foreach($carts as $cart=>$value){
            $quantity = $value['quantity'];
            $price = $value['price'];
            DB::table('order_detail')->insert([
                'quantity' => $quantity,
                'price' => $price,
                'id_order' => $id_order_detail,
                'id_product' => $cart
            ]);
        }
        $quantityD = DB::table('order_detail')->where('id_order','=',$id_order_detail)->where("id_product",'=',$cart)->select('quantity')->get();
        $amounts = DB::table('products')->select('Product_quantity')->get();
        foreach ($amounts as $amount){
            $productQ = $amount -> Product_quantity;
        }
        $slcl = $productQ-$quantity;
        DB::table('products')->where('id',"=",$cart)->update(['Product_quantity' => $slcl]);

        session()->forget('cart');
        return redirect('/home/order/list');
    }

    public function detail($id){
        $order_detail = DB::table('order_detail')
            ->join("products", "products.id","=","order_detail.id_product")
            ->join('order', "order.id","=","order_detail.id_order")
            ->select("order_detail.*","products.Product_name","products.Product_description","products.image","order.order_status")
            ->where("order_detail.id_order","=",$id)
            ->get();

        return view("home/order/detail",["order_detail"=>$order_detail]);
    }

    public function delete($id){
        DB::table('order')->where("id","=",$id)
            ->update(['order_status' => 3]);
        return redirect('/home/order/list');
    }
}
