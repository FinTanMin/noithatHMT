<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class authController extends Controller
{
    public function login()
    {
        return view("home/auth/login");
    }
    public function register()
    {
        return view("home/auth/register");
    }
    public function registerPost(Request $request){
        $credentials = $request->validate([
            'name' => ['required', 'min:3','max:255'],
            'email' =>['required','email'],
            'phone'=> 'required',
            'address' => 'required',
            'password' => ['required','min:6','max:255'],]);
        $credentials['password'] = bcrypt($credentials['password']);
        User::create($credentials);
        return redirect("/home/login");
    }
    public function loginPost(Request $request)
    {
        $credentials = $request->only("email", "password");
        $check = Auth::attempt($credentials);
        if ($check) {
            $role = Auth::user()->role;
            if($role == 1){
                return redirect("/admin/product");
            }
            return redirect('/');
        }
        return redirect("/home/login");
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
