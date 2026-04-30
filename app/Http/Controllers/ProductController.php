<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product(){
        $data=Product::with(['user:id,name','category:id,cate_name'])->get();
        return view('admin.product',compact('data'));
    }
    public function addProduct(){
        $cate=Category::all();
        return view('admin.addProduct',compact('cate'));
    }
    public function editProduct($id){
        $data=Product::findOrFail($id);
        $cate=Category::all();
        return view('admin.editProduct',compact('data','cate'));
    }
    public function createProduct(Request $req){
        try {
        $data=$req->validate([
            'pro_name'=>"required",
            'price'=>'required|numeric',
            'stock'=>'required|integer',
            'cate_id'=>'required'
        ]);
        $data['user_id']=Auth::user()->id;
        if($req->hasFile('image')){
            $file=$req->file('image');
            $fileName=time().'_'.$file->getClientOriginalName();
            $file->move('product',$fileName);
            $data['image']=url('product/',$fileName);
        }
        Product::create($data);
        return redirect('/admin/product/add');//code...
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function updateProduct(Request $req,$id){
        try {
            $pro=Product::findOrFail($id);
        $data=$req->validate([
            'pro_name'=>"required",
            'price'=>'required|numeric',
            'stock'=>'required|integer',
            'cate_id'=>'required'
        ]);
        $data['user_id']=Auth::user()->id;
        if($req->hasFile('image')){
            $file=$req->file('image');
            $fileName=time().'_'.$file->getClientOriginalName();
            $file->move('product',$fileName);
            $data['image']=url('product/',$fileName);
        }else{
            $data['image']=$pro['image'];
        }
        $pro->update($data);
        return redirect('/admin/product');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }
    public function deleteProduct($id){
        $data=Product::findOrFail($id);
        $data->delete();
        return redirect('/admin/product');
    }
}
