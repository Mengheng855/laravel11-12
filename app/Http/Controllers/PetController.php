<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use Illuminate\Http\Request;
class PetController extends Controller
{
    public function pet(){
        $pets=Pet::all();
        return response()->json([
            'data'=>$pets,
            'status'=>200,
            'message'=>'get data successfully'
        ]);
    }
    public function insert(Request $req){
        $data=$req->validate([
            'name'=>'required',
            'gender'=>'required',
            'age'=>'integer|required'
        ]);
        if($req->hasFile('image')){
            $file=$req->file('image'); 
            $fileName=$file->getClientOriginalName();
            $file->move('image',$fileName);
            $data['image']=url('image/'.$fileName);
        }
        Pet::create($data);
        return response()->json([
            'data'=>$data,
            'status'=>201,
            'message'=>'inserted'
        ]);
    }
    public function update(Request $req,$id){
        $update=Pet::findOrFail($id);
        $data=$req->validate([
            'name'=>'required',
            'gender'=>'required',
            'age'=>'integer|required'
        ]);
        if($req->hasFile('image')){
            $file=$req->file('image'); 
            $fileName=$file->getClientOriginalName();
            $file->move('image',$fileName);
            $data['image']=url('image/'.$fileName);
        }else{
            $data['image']=$update->image;
        }
        $update->update($data);
        return response()->json([
            'data'=>$data,
            'status'=>200,
            'messgae'=>'updated successfully'
        ]);
    }
    public function delete($id){
        $delete=Pet::findOrFail($id);
        $delete->delete();
        return response()->json([
            'data'=>$delete,
            'status'=>200,
            'message'=>'deleted successfully'
        ]);
    }
}
