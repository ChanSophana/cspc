<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
Use Auth;
use Image;
use DeepCopy\TypeFilter\ReplaceFilter;
class UsersController extends Controller
{
    
    public function profile(){
        return view('auth.profile', array('user'=> Auth::user()));
    }
    public function update_image(Request $request){  
       if($request->hasFile('image')){
           $image = $request->file('image');
           $filename=time().'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(300,300)->save( public_path('assets/images/'.$filename) );
           $user= Auth::user();
           $user -> image = $filename;
           $user->save(); 
       }
       return view('home', array('user'=> Auth::user()));  
    }
}
