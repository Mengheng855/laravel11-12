<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function login(){
        return view('auth.login');
    }
    public function addUser(Request $req){
        $data=$req->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        User::create($data);
        return redirect('/login');
    }
}
