<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function product(){

        $products = Product::all();
        return view('product', compact('products'));

    }
}
