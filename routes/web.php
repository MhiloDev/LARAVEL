<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('welcome');});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'show']);

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/products',[ProductController::class, 'index']); //list product
    Route::get('/products/create',[ProductController::class, 'create']); //make product
    Route::post('/products',[ProductController::class, 'store']); //create product
    Route::get('/products/{product}/edit',[ProductController::class, 'edit']); // edit product
    Route::post('/products/{product}/edit',[ProductController::class, 'update']); // update product
    Route::delete('/products/{id}',[ProductController::class, 'destroy']); //delete product
    
    Route::get('/products/{id}/image',[ImageController::class, 'index']); //list img
    Route::post('/products/{id}/image',[ImageController::class, 'store']); //update img
    Route::delete('/products/{id}/image',[ImageController::class, 'destroy']); //delete img
    
    Route::get('/categories',[CategoryController::class, 'index']); //list Category
    Route::get('/categories/create',[CategoryController::class, 'create']); //make Category
    Route::post('/categories',[CategoryController::class, 'store']); //create Category
    Route::get('/categories/{category}/edit',[CategoryController::class, 'edit']); // edit Category
    Route::post('/categories/{category}/edit',[CategoryController::class, 'update']); // update Category
    Route::delete('/categories/{id}',[CategoryController::class, 'destroy']); //delete Category
});