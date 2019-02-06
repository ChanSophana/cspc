<?php
use App\Category;
use App\Product;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $cate=Category::all();
    $laptop=Product::select('name','outprice','description','image')->where('catid',1)->get();
    $desktop=Product::select('name','outprice','description','image')->where('catid',2)->get();
    return view('welcome',['cate'=>$cate,'laptop'=>$laptop,'desktop'=>$desktop]);
});
Route::get('/home/product/', 'ProductController@index')->name('viewspro');
Route::post('/home/product/insert', 'ProductController@insert')->name('addpro');
Route::post('/home/product/update', 'ProductController@update')->name('updatepro');
Route::get('/home/category/', 'CategoryController@index');
Route::get('/home/supplier/', 'SupplierController@index');
Auth::routes();
Route::auth();
Route::get('/home', 'HomeController@index')->name('home');

