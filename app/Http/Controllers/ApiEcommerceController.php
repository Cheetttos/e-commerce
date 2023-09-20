<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiEcommerceController extends Controller
{
    //
    public function products($category_id=null)
    {
        $products=(is_null($category_id)?
                    Product::with('category')->get():
                    Product::where('category_id',$category_id)->with('category')->get());
        return response()->json($products);        //return view('e-commerce.ejercicio');

    }

    public function categories(Request $req)
    {
        $categories = (is_null($req->input("term"))?
            Category::select('name as text', 'id')->get():
            Category::where("name", "LIKE", '%'.$req->input("term").'%')->select('name as text', 'id')->get()
        );
        return response()->json(["results"=>$categories]);
    }
}
