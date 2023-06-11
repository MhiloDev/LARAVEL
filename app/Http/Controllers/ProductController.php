<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProduct;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products')); //listado
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories')); //formulario
    }

    public function store(StoreProduct $request, Product $product)
    {
        //registrar nuevo producto bd
        Product::create($request->all());
        return redirect('/admin/products');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit')->with(compact('product','categories')); //formulario
    }

    public function update(StoreProduct $request, Product $product)
    {
        //editar el producto bd
        $product->update($request->all());
        return redirect('/admin/products');
    }

    public function destroy($id)
    {
    $product = Product::findOrFail($id);
    $ok = $product->delete();

    if ($ok) {
        return back()->with('success', 'Se ha eliminado exitosamente');
    } else {
        return back()->with('error', 'Ha ocurrido un problema');
    }
}    

}