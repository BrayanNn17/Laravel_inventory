<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
    //return view('welcome');
})->middleware('auth');

Route::get('/usuario', function () {
    return "ruta usuario";
});
Route::get('/usuario/{id}', function ($id) {
    //return "el id es ".$id;
    return "el id es {$id}";
});
/*
use App\Http\Controllers\PersonaController;
Route::get('/form/{id?}', [PersonaController::Class, "mostrarForm"]
)-> where('id','[0-9]+');
*/
//use Illuminate\Support\Facades\DB;
/*use App\Models\Product;
Route::get('/products', function(){
    // $products = DB::table('product')->get();
    $products = Product::get();
    return dd($products); //var_dump
});*/

use App\Http\Controllers\ProductController;
Route :: get('/products',[ProductController::class,'show'])->name('products');
Route :: get('/product/form/{id?}',[ProductController::class,'new'])->name('productform');
Route :: post('/products/save',[ProductController::class,'save'])->name('productSave');
Route :: get('/product/delete/{id}',[ProductController::class,'delete'])->name('productDelete');

use App\Http\Controllers\BrandController;
Route :: get('/brands',[BrandController::class,'show'])->name('brands');
Route :: get('/brand/form/{id?}',[BrandController::class,'new'])->name('brandform');
Route :: post('/brand/save',[BrandController::class,'save'])->name('brandSave');
Route :: get('/brand/delete/{id}',[BrandController::class,'delete'])->name('brandDelete');

use App\Http\Controllers\CategoryController;
Route :: get('/categories',[CategoryController::class,'show'])->name('categories');
Route :: get('/category/form/{id?}',[CategoryController::class,'new'])->name('categoryform');
Route :: post('/category/save',[CategoryController::class,'save'])->name('categorySave');
Route :: get('/category/delete/{id}',[CategoryController::class,'delete'])->name('categoryDelete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\InvoiceController;
Route::get('/invoices',[InvoiceController::class,'show'] );
Route::get('/invoice/form',[InvoiceController::class,'form'])->name('invoice.form');
