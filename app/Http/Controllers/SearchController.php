<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request){
        $query = $request->input('query');

        $products = Product::where(function($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->orWhere('price', 'like', '%' . $query . '%')
                ->orWhereHas('category', function ($queryBuilder) use ($query) {
                    $queryBuilder->where('name', 'like', '%' . $query . '%');
                });
        })->paginate(10);
        return view('admin.search.show')->with(compact('products','query'));
    }
}
