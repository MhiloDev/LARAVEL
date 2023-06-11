<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index($id){
        $product = Product::find($id);
        $image = $product->image;
        return view('admin.products.image.index')->with(compact('product','image'));
    }
    
    public function store(Request $request, $id){
        // guardar img en la bd
        $file = $request->file('img');
        $path = public_path().'/images/products';
        $fileName = uniqid().$file->getClientOriginalName();
        $file->move($path,$fileName);

        //crear 1 registro en la tabla product_images
        $productImage = new ProductImage;
        $productImage->img = $fileName;
        $productImage->product_id = $id;
        $productImage->save();
        
        return back();
    }

    public function destroy(Request $request, $id)
    {
    }
}
