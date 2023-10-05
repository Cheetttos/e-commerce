<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class ApiEcommerceController extends Controller
{
    //
    public function products($category_id = null)
    {
        $products = ((is_null($category_id) || $category_id = 0) ?
            Product::with('category')->get() :
            Product::where('category_id', $category_id)->with('category')->get());
        return response()->json($products);        //return view('e-commerce.ejercicio');

    }

    public function orders()
    {
        return view('e-commerce.orders-api');
    }

    public function categories(Request $req)
    {
        $categories = (is_null($req->input("term")) ?
            Category::select('name as text', 'id')->get() :
            Category::where("name", "LIKE", '%' . $req->input("term") . '%')->select('name as text', 'id')->get()
        );
        return response()->json(["results" => $categories]);
    }

    public function insert_user(Request $request)
    {
        $rules = [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|max:70|unique:users',
            'phone' => 'required|min:10',
            'address' => 'required|max:200',
            'password' => 'required|min:8|max:32',
        ];

        $messages = [
            'first_name.required' => 'Por favor, ingresa tu nombre.',
            'first_name.max' => 'Máximo 50 caracteres para el nombre.',
            'last_name.required' => 'Por favor, ingresa tu apellido.',
            'last_name.max' => 'Máximo 50 caracteres para el apellido.',
            'email.required' => 'Por favor, ingresa tu correo electrónico.',
            'email.email' => 'Ingresa una dirección de correo válida.',
            'email.max' => 'Máximo 70 caracteres para el correo electrónico.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'phone.required' => 'Por favor, ingresa tu número de teléfono.',
            'phone.min' => 'Mínimo 10 caracteres para el número de teléfono.',
            'address.required' => 'Por favor, ingresa tu dirección.',
            'password.required' => 'Por favor, ingresa tu contraseña.',
            'password.min' => 'Mínimo 8 caracteres para la contraseña.',
            'password.max' => 'Máximo 32 caracteres para la contraseña.',
        ];

        $this->validate($request, $rules, $messages);

        // En caso de éxito (si se pasa la validación)
        return response()->json(['message' => 'Validación exitosa'], 200);
    }
}
