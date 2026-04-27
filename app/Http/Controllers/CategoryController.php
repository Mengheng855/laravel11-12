<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        return view('admin.category');
    }
    public function addCategory(){
        return view('admin.addCategory');
    }
    public function editCategory(){
        return view('admin.editCategory');
    }
}
