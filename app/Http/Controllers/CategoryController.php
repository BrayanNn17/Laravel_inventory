<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function show(){
        $categoriesList = Category::all();
        return view('category/list',['categoriesList'=>$categoriesList]);
    }
    function delete($id){
        //Product::destroy($id);
        $category = Category::find($id);
        $category->delete();
        return redirect('/categories');
        //return redirect()->route('products');
    }
    function new($id =null){
        if($id==null){
            $category = new Category();
        }    
        else{
            $category = Category::findOrFail($id); 
        }
        return view('category/form',['category' => $category]);

    }
    function save(Request $request){
        $category = new Category();
        if($request->id >0){
            $category = Category::findOrFail($request->id);
        }
        $request->validate(
            [
                'name'=>'required|max :50',
                'description'=>'required|max :250',
            ]
        );
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect('/categories')->with('message','Correcto, Categoria Registrada');
        //return dd($request);
    }
}
