<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $search = '';
        if (isset($request->search)) {
            $search = $request->search;
        }
        $products = DB::table("products")
            ->join("category", "products.category_id", "=", "category.id")
            ->join("brand", "products.brand_id", "=", "brand.id")
            ->where("products.Product_name", "LIKE", "%$search%")
            ->select('products.*', 'category.Category_name','brand.brand_name')
            ->paginate(6);
//        dd($search);
        return view('/home/home', [
            "products" =>$products,
            "search" => $search
        ]);
    }
    public function brand(){
        $products1 = DB::table("products")
            ->join("category", "products.category_id", "=", "category.id")
            ->join("brand", "products.brand_id", "=", "brand.id")
            ->select('products.*', 'category.Category_name','brand.brand_name')
            ->where('brand_id','=',1)
            ->paginate('3');
        $products2 = DB::table("products")
            ->join("category", "products.category_id", "=", "category.id")
            ->join("brand", "products.brand_id", "=", "brand.id")
            ->select('products.*', 'category.Category_name','brand.brand_name')
            ->where('brand_id','=',2)
            ->paginate('3');
        $products3 = DB::table("products")
            ->join("category", "products.category_id", "=", "category.id")
            ->join("brand", "products.brand_id", "=", "brand.id")
            ->select('products.*', 'category.Category_name','brand.brand_name')
            ->where('brand_id','=',3)
            ->paginate('3');
        return view('/home/brand', compact('products1','products2','products3') );
    }
    public function brand1()
    {
        $products = DB::table("products")
            ->join("category", "products.category_id", "=", "category.id")
            ->join("brand", "products.brand_id", "=", "brand.id")
            ->select('products.*', 'category.Category_name', 'brand.brand_name')
            ->where('brand_id', '=', 1)
            ->get();
        return view('/home/brand/list1', compact('products'));

    }
    public function brand2()
    {
        $products = DB::table("products")
            ->join("category", "products.category_id", "=", "category.id")
            ->join("brand", "products.brand_id", "=", "brand.id")
            ->select('products.*', 'category.Category_name', 'brand.brand_name')
            ->where('brand_id', '=', 2)
            ->get();
        return view('/home/brand/list2', compact('products'));
    }
    public function brand3()
    {
        $products = DB::table("products")
            ->join("category", "products.category_id", "=", "category.id")
            ->join("brand", "products.brand_id", "=", "brand.id")
            ->select('products.*', 'category.Category_name', 'brand.brand_name')
            ->where('brand_id', '=', 3)
            ->get();
        return view('/home/brand/list3', compact('products'));

    }
    public function category1()
    {
        $products = DB::table("products")
            ->join("category", "products.category_id", "=", "category.id")
            ->join("brand", "products.brand_id", "=", "brand.id")
            ->select('products.*', 'category.Category_name', 'brand.brand_name')
            ->where('category_id', '=', 1)
            ->get();
        return view('/home/category/list1', compact('products'));

    }
    public function category2()
    {
        $products = DB::table("products")
            ->join("category", "products.category_id", "=", "category.id")
            ->join("brand", "products.brand_id", "=", "brand.id")
            ->select('products.*', 'category.Category_name', 'brand.brand_name')
            ->where('category_id', '=', 2)
            ->get();
        return view('/home/category/list2', compact('products'));

    }
    public function category3()
    {
        $products = DB::table("products")
            ->join("category", "products.category_id", "=", "category.id")
            ->join("brand", "products.brand_id", "=", "brand.id")
            ->select('products.*', 'category.Category_name', 'brand.brand_name')
            ->where('category_id', '=', 2)
            ->get();
        return view('/home/category/list3', compact('products'));

    }
    public function category(){
        $products1 = DB::table("products")
            ->join("category", "products.category_id", "=", "category.id")
            ->join("brand", "products.brand_id", "=", "brand.id")
            ->select('products.*', 'category.Category_name','brand.brand_name')
            ->where('category_id','=',1)
            ->paginate('3');
        $products2 = DB::table("products")
            ->join("category", "products.category_id", "=", "category.id")
            ->join("brand", "products.brand_id", "=", "brand.id")
            ->select('products.*', 'category.Category_name','brand.brand_name')
            ->where('category_id','=',2)
            ->paginate('3');
        $products3 = DB::table("products")
            ->join("category", "products.category_id", "=", "category.id")
            ->join("brand", "products.brand_id", "=", "brand.id")
            ->select('products.*', 'category.Category_name','brand.brand_name')
            ->where('category_id','=',3)
            ->paginate('3');
        return view('/home/category', compact('products1','products2','products3') );
    }
    public function cart(){
        if(Auth::check()){
        $cart =session()->get('cart');
        return view('/home/cart' ,compact('cart'));}
        return redirect("/home/login");
    }
    public function delete_cart($id){
        $cart = session()->get('cart');
        isset($cart[$id]);
        unset($cart[$id]);
            session()->put('cart',$cart);
        return redirect()->back();
    }

    public function add_cart(Request $request, $id){
//        session()->flush();
            $cart = session()->get('cart');
            $product=Product::find($id);
            if(isset($cart[$id])){
                $cart[$id]['quantity'] = $cart[$id]['quantity']+$request->quantity;
            }else{
                $cart[$id]=[
                  'name' => $product->Product_name,
                    'image' => $product->image,
                    'price' => $product->Product_price*$request->quantity,
                    'quantity' => $request->quantity
                ];
            }
            session()->put('cart', $cart);
        return redirect('/home/cart');
    }


    public function update_cart(Request $request, $id){
        $cart = session()->get('cart');
        if ($request->button == "0"){
            if (isset($cart[$id])){
                if ($cart[$id]['quantity'] > 1) {
                    $cart[$id]['quantity']--;
                    session()->put('cart', $cart);
                }else{
                    unset($cart[$id]);
                    session()->put('cart',$cart);
                }
            }
        }else{
            if(isset($cart[$id])){
                $cart[$id]['quantity']++;
                session()->put('cart', $cart);
            }
        }
        return redirect('/home/cart');
    }
    public function detail($id){
        $products = DB::table("products")
            ->join("category", "products.category_id", "=", "category.id")
            ->join("brand", "products.brand_id", "=", "brand.id")
            ->select('products.*', 'category.Category_name','brand.brand_name')
            ->where('products.id','=',$id)
            ->first();
        return view('admin/product/detail', ["products" =>$products]);
    }
    public function order(){
        return view('/home/order/list');
    }
}
