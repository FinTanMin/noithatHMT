<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function index(){
        $order = DB::table('order')
            ->join("users" ,"users.id","=","order.id_user")
            ->join("shipping", "shipping.id","=","order.id_shipping")
            ->select("order.*","users.name","users.phone","users.address","shipping.shipping_name")
            ->orderBy("order_status","asc")
            ->orderBy("order_date","desc")

            ->get();
        return view("admin/order/list",["order"=>$order]);
    }
    public function update(Request $request,$id){
        $status = $request -> status;
        DB::table('order')
            ->where(["id" => $id])
            ->update([
                'order_status' => $status
            ]);
        return redirect("/admin/order/list");
    }
    public function detail($id){
        $order_detail = DB::table('order_detail')
            ->join("products", "products.id","=","order_detail.id_product")
            ->join('order', "order.id","=","order_detail.id_order")
            ->select("order_detail.*","products.Product_name","products.Product_description","products.image","order.order_status")
            ->where("order_detail.id_order","=",$id)
            ->get();
        return view("admin/order/detail",["order_detail"=>$order_detail]);
    }
}
