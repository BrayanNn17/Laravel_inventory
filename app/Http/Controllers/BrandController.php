<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function show(){
        $brandsList = Brand::all();
        return view('brand/list',['brandsList'=>$brandsList]);
    }
    function delete($id){
        //Product::destroy($id);
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('/brands');
        //return redirect()->route('products');
    }
    function new($id =null){
        if($id==null){
            $brand = new Brand();
        }    
        else{
            $brand = Brand::findOrFail($id); 
        }
        return view('brand/form',['brand' => $brand]);

    }
    function save(Request $request){
        $brand = new Brand(); 
        if($request->id >0){
            $brand = Brand::findOrFail($request->id);
        }
        $request->validate(
            [
                'name'=>'required|max :50'
            ]
        );
        $brand->name = $request->name;
        $brand->save();
        return redirect('/brands')->with('message','Correcto, Marca Registrada');
        //return dd($request);
    }
}
