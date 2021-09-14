<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
//use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    function show(){
        $productsList = Product::all();
        //$productsList = Product::all();
        return view('product/list',['productsList'=>$productsList]);
    }
    function delete($id){
        //Product::destroy($id);
        $product = Product::find($id);
        $product->delete();
        return redirect('/products');
        //return redirect()->route('products');
    }
    function new($id =null){
        if($id==null){
            $product = new Product();
        }    
        else{
            $product = Product::findOrFail($id); 
        }
        $brands = Brand::all();
        $categories = Category::all();
        return view('product/form',['product' => $product,'brands'=>$brands,'categories'=>$categories]);

    }
    function save(Request $request){
        $product = new Product();
        if($request->id >0){
            $product = Product::findOrFail($request->id);
        }
        $request->validate(
            [
                'name'=>'required|max :50',
                'cost'=>'required',
                'price'=>'required',
                'quantity'=>'required|numeric',
                'price'=>'required|max :50',
                'brand'=>'required',
                'category'=>'required'
            ]
            );
            
        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand;
        $product->category_id = $request->category;

        $product->save();
        return redirect('/products')->with('message','Correcto, Producto Registrado');
        //return dd($request);
    }
}
