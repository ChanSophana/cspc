<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Image;
use Auth;

class CategoryController extends Controller
{
    public function index(){
        $cate=Category::all();
        return view('category.views',['cate'=>$cate]);
    }
    public function insert(Request $request){
        $cate=new Category;
        $cate->category=$request->input('category');
        $cate->description=$request->input('description');
        $cate->userid=Auth::user()->id;   
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save( public_path('assets/images/category/'.$filename) );
            $cate -> image = $filename;
        }
        $cate->save();
    }
}
