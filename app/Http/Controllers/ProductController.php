<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data=Product::all();
        return view('index',compact('data'));
    }
    public function insert(Request $req){
        $data=$req->validate([
            'name'=>'required',
            'price'=>'numeric|required',
            'qty'=>'integer|required'
        ]);
        $data['image']='';
        if($req->hasFile('image')){
            $file=$req->file('image');
            $fileName=$file->getClientOriginalName();
            $file->move('image',$fileName);
            $data['image']='image/'.$fileName;
        }
        Product::create($data);
        return redirect('/');
    }
    public function update(Request $req){
        $update=Product::findOrFail($req->id);
        $data=$req->validate([
            'name'=>'required',
            'price'=>'numeric|required',
            'qty'=>'integer|required'
        ]);
        if($req->hasFile('image')){
            $file=$req->file('image');
            $fileName=$file->getClientOriginalName();
            $file->move('image',$fileName);
            $data['image']='image/'.$fileName;
        }else{
            $data['image']=$update->image;
        }
        $update->update($data);
        return redirect('/');
    }
}
