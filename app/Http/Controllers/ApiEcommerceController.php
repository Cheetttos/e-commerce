<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiEcommerceController extends Controller
{
    //
    public function products(){
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
        ]);
    }
}
