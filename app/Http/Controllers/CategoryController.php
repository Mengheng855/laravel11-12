<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function category(){
        $data=Category::with('user:id,name')->get();
        return view('admin.category',compact('data'));
    }
    public function addCategory(){
        return view('admin.addCategory');
    }
    public function editCategory($id){
        $data=Category::findOrFail($id);
        return view('admin.editCategory',compact('data'));
    }
    public function createCategory(Request $req){
        $data=$req->validate([
            'cate_name'=>'required'
        ]);
        $data['user_id']=Auth::user()->id;
        if($req->hasFile('image')){
            $file=$req->file('image');
            $fileName=time().'_'.$file->getClientOriginalName();
            $file->move('category',$fileName);
            $data['image']=url('category/'.$fileName);
        }
        Category::create($data);
        return redirect('/admin/category/add');
    }
    public function updateCategory(Request $req, $id){
        $cate=Category::findOrFail($id);
        $data=$req->validate([
            'cate_name'=>'required'
        ]);
        $data['user_id']=Auth::user()->id;
        if($req->hasFile('image')){
            $file=$req->file('image');
            $fileName=time().'_'.$file->getClientOriginalName();
            $file->move('category',$fileName);
            $data['image']=url('category/'.$fileName);
        }else{
            $data['image']=$cate['image'];
        }
        $cate->update($data);
        return redirect('/admin/category');
    }
    public function deleteCategory($id){
        $data=Category::findOrFail($id);
        $data->delete();
        return redirect('/admin/category');
    }
}
