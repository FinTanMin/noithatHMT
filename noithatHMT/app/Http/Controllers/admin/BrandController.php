<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller{
    public function index()
    {
        $brand = Brand::all();
        return view("/admin/brand/list", ["brand" => $brand]);
    }

    public function add()
    {
        return view('admin/brand/add');
    }

    public function save(Request $request)
    {
        $brandName = $request->name;
        DB::table('brand')->insert([
            'brand_name' => $brandName,
        ]);
        return redirect('/admin/brand');
    }

    public function delete($id)
    {
        DB::table("brand")->where("id", $id)->delete();
        return redirect("/admin/brand");
    }


}


