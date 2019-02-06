<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Category;
use App\Product;
Use Auth;
use Image;
use DeepCopy\TypeFilter\ReplaceFilter;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
class ProductController extends Controller
{
 
    public function index(){
        $sup=Supplier::all();
        $cat=Category::all();
        $pro=Product::join('supplier','supplier.id','products.supid')->join('category','category.id','products.catid')->
        select('products.name','products.qty','products.inprice','products.outprice','products.description','supplier.com_name as sup_name','category.category')->where('products.active',1)->get();
        return DataTables::of($pro)
                ->addColumn('action',function($pro){
                    '<a onclick="showData('.$pro->id.')" class="btn btn-success btn-xs fa fa-check"></a>'.' '.
                    '<a onclick="Edit('.$pro->id.')" class="btn btn-primary btn-xs fa fa-pencil"></a>'.' '.
                    '<a onclick="Delete('.$pro->id.')" class="btn btn-danger btn-xs fa fa-trash-o"></a>';
                })->make(true);
    }
    public function insert(Request $request){
        $pro=new Product;
        $pro->name=$request->input('name');
        $pro->supid=$request->input('supid'); 
        $pro->catid=$request->input('catid');
        $pro->qty=$request->input('qty');
        $pro->inprice=$request->input('inprice');
        $pro->outprice=$request->input('outprice');
        $pro->onorder=$request->input('onorder');
        $pro->description=$request->input('discription');
        $pro->userid=Auth::user()->id;        
        if ($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('assets/images/product/',$filename);
            $pro->image=$filename;
        }else {
            // return $request;
            $pro->image='';
        }
        $pro->save();
        $sup=Supplier::all();
        $cat=Category::all();
        $pro=Product::join('supplier','supplier.id','products.supid')->join('category','category.id','products.catid')->
        select('products.name','products.qty','products.inprice','products.outprice','products.description','supplier.com_name as sup_name','category.category')->where('products.active',1)->get();
        return view('Product.views',['pro'=>$pro,'sup'=>$sup,'cat'=>$cat]);
     }
    public function update(Request $request)
      {
        return view('Product.views',['pro'=>$pro,'sup'=>$sup,'cat'=>$cat]);
      }
     
}
