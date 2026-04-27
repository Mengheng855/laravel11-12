<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(){
        return view('admin.product');
    }
    public function addProduct(){
        return view('admin.addProduct');
    }
    public function editProduct(){
        return view('admin.editProduct');
    }
}
