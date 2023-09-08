<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class SiteController extends Controller
{
    //
    public function services(){
        return view('services');
    }
    public function contact(){
        return view('contact');
    }
    public function faq(){
        return view('faq');
    }
    public function product(){
        return view('product');
    }
    public function about(){
        $about_message="Hola, somos una empresa que se dedica al desarrollo de sofware de Sistemas de Información";
        return view('about',["about_message" => $about_message]);
    }

    public function product_list($category_id=null){
        $categories = Category::all();
        $products = (is_null($category_id)?
                    Product::all():
                    Product::where('category_id',$category_id)->get()
        );
        return view('e-commerce.product-list', compact('products','categories'));
    }
}
