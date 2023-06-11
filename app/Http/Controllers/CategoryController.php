<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Requests\StoreCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(10);
        return view('admin.categories.index')->with(compact('categories')); //listado
    }

    public function create()
    {
        return view('admin.categories.create'); //formulario
    }

    public function store(StoreCategory $request, Category $category)
    {
        //registrar nuevo producto bd
        Category::create($request->all());
        return redirect('/admin/categories');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with(compact('category')); //formulario
    }

    public function update(StoreCategory $request, Category $category)
    {
        //editar nuevo producto bd
        $category->update($request->all());
        return redirect('/admin/categories');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $ok = $category->delete();

        if ($ok) {
            return back()->with('success', 'Se ha eliminado exitosamente');
        } else {
            return back()->with('error', 'Ha ocurrido un problema');
        }
    }
}