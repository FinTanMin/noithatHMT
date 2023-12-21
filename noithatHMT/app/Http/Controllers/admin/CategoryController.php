<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view("/admin/category/list", ["category" => $category]);
    }

    public function add()
    {
        return view('admin/category/add');
    }

    public function save(Request $request)
    {
        $categoryName = $request->name;
        DB::table('category')->insert([
            'Category_name' => $categoryName,
        ]);
        return redirect('/admin/category');
    }

    public function delete($id)
    {
        DB::table("category")->where("id", $id)->delete();
        return redirect("/admin/category");
    }


}
