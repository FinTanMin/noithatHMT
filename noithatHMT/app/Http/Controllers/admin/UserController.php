<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view("/admin/user/list", compact('users'));
    }
    public function update(Request $request,$id){
        $role = $request -> role;
        DB::table('users')
            ->where(["id" => $id])
            ->update([
                'role' => $role
            ]);
        return redirect("/admin/user");
    }
}
