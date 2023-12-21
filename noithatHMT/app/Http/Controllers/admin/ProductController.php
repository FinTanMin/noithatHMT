<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = '';
        if (isset($request->search)) {
            $search = $request->search;
        }
        $products = DB::table("products")
            ->join("category", "products.category_id", "=", "category.id")
            ->join("brand", "products.brand_id", "=", "brand.id")
            ->where("products.Product_name", "LIKE", "%$search%")
            ->select('products.*', 'category.Category_name','brand.brand_name')
            ->get();
        return view('admin/product/list', [
            "products" =>$products,
            "search" => $search
        ]);
    }

    public function add()
    {
        return view('admin/product/add');
    }


    public function save(Request $request)
    {
        $productName = $request->name;
        $category = $request->category;
        $brand = $request->brand;
        $price = $request->price;
        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $image);
        $quantity = $request->quantity;
        $description = $request->description;
        DB::table('products')->insert([
            'Product_name' => $productName,
            'category_id' => $category,
            'brand_id'=>$brand,
            'Product_price' => $price,
            'image' => $image,
            'Product_quantity' => $quantity,
            'Product_description' => $description
        ]);
        return redirect('/admin/product');
    }

    public function update(Request $request, $id)
    {
        $productName = $request->name;
        $category = $request->category;
        $brand = $request->brand;
        $price = $request->price;
        $quantity = $request->quantity;
        $description = $request->description;
        DB::table('products')
            ->where(["id" => $id])
            ->update([
                'Product_name' => $productName,
                'category_id' => $category,
                'brand_id' => $brand,
                'Product_price' => $price,
                'Product_quantity' => $quantity,
                'Product_description' => $description
            ]);
        return redirect("/admin/product
        ");
    }

    public function delete($id)
    {
        DB::table("products")->where("id", $id)->delete();
        return redirect("/admin/product");
    }

    public function edit($id)
    {
        $obj = DB::table("products")
            ->where("id", $id)
            ->first();
        return view('admin/product/edit', compact('obj')
        );
    }

}
