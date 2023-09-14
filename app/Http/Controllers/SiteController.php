<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Review;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;

class SiteController extends Controller
{
    //

    public function product_list($category_id=null){
        $categories = Category::all();
        $products = (is_null($category_id)?
                    Product::all():
                    Product::where('category_id',$category_id)->get()
        );
        return view('e-commerce.product-list', compact('products','categories'));
    }

    public function productsByCategory(){
        $categories = Category::all();
        return view('e-commerce.products-by-category',compact('categories'));
    }

    public function contact(Request $request){
        if($request->isMethod("POST")){
            $request->validate([
                'name' => 'required|max:50',
                'email' => 'required|email|max:50',
                'subject' => 'required|max:100',
                'message' => 'required|min:5',
            ],[
                'name.required' => 'Please type your name.',
                'name.max' => '50 characters maximum.',
                'email.required' => 'Please type your email.',
                'email.email' => 'Please enter a valid email address.',
                'email.max' => '50 characters maximum.',
                'subject.required' => 'Please type your subject.',
                'subject.max' => '100 characters maximum.',
                'message.required' => 'Please type your message.',

            ]);
            $contact = new Contact;
            $contact->name=$request->input('name');
            $contact->email=$request->input('email');
            $contact->subject=$request->input('subject');
            $contact->message=$request->input('message');   
            $contact->save();
            Mail::to($contact->email)->send(new contactMail($contact));
            return redirect()->route("contact")->with('success', 'Your contact messsage has been sent.');
        }
        return view('e-commerce.contact');
    }

    public function detail($id_producto = null){
        $categories = Category::all();
        $review = Review::where('product_id',$id_producto)->get();
        $products = (is_null($id_producto)?
                Product::all():
                Product::where('id',$id_producto)->get()
        );
        return view('e-commerce.product-detail',compact('products','categories','review'));
    }

    public function review(Request $request){
        if($request->isMethod("POST")){
            $request->validate([
                'name' => 'required|max:100',
                'email' => 'required|email|max:100',
                'review' => 'required|max:255',
            ],[
                'name.required' => 'Please type your name.',
                'name.max' => '100 characters maximum.',
                'email.required' => 'Please type your email.',
                'email.email' => 'Please enter a valid email address.',
                'email.max' => '100 characters maximum.',
                'review.required' => 'Please type a review',
                'review.max' => '255 characters maximum.',

            ]);
            $review = new Review;
            $review->name=$request->input('name');
            $review->product_id=$request->input('product_id');
            $review->email=$request->input('email');
            $id = $review->product_id;
            $review->review=$request->input('review');
            $review->ratting=$request->input('ratting');
            $review->save();
            return redirect()->route("details",$id);
        }
    }

}
