<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user(){
        return view('user.index');
    }
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
    public function checkLogin(Request $req){
        $data['email']=$req->email;
        $data['password']=$req->password;
        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
            if(Auth::user()->is_admin==1){
                return redirect('/admin/dashboard');
            }elseif(Auth::user()->is_admin==0){
                return redirect('/');
            }else{
                return redirect('/register');
            }
        }else{
            return redirect('/login')->with('msg','khos hz bro');
        }
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function ManageUser(){
        return view('admin.user');
    }
}
