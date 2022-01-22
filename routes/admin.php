<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\OrdenesController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;


Route::get('/prueba', function () {
  return 'Admin';
});

Route::as('admin.')->group(function(){
    Route::get('/ordenes',[OrdenesController::class,'index'])->name('ordenes.index');
    Route::get('/ordenes/{orden}',[OrdenesController::class,'show'])->name('ordenes.show');

    Route::get('prods', [ProductoController::class, 'index'])->middleware('auth')->name('adminProductos');
    Route::post('/prods/store', [ProductoController::class,'store'])->middleware('auth')->name('storeProductos'); 
    Route::put('/prods/update', [ProductoController::class,'update'])->middleware('auth')->name('updateTProductos');
    Route::delete('/prods/delete', [ProductoController::class,'destroy'])->middleware('auth')->name('deleteProductos');
    Route::get('/prods/getProducto/{id}', [ProductoController::class,'getProductbyID'])->middleware('auth')->name('getProducto');
    Route::get('/prods/editarImagenes/{producto:slug}', [ProductoController::class,'editarImagenes'])->middleware('auth')->name('editarImagenes');
    Route::delete('/prods/eliminarImagen', [ProductoController::class,'eliminarImagen'])->middleware('auth')->name('eliminarImagen');
    Route::post('/prods/agregarImagenes', [ProductoController::class,'agregarImagenes'])->middleware('auth')->name('agregarImagenes'); 
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*CRUD CATEGORIA */
Route::resource('categoria/',CategoriaController::class);
Route::resource('categoria',\App\Http\Controllers\CategoriaController::class);
Route::post('admin/categoria/store', [CategoriaController::class,'store'])->name('storeCategoria'); 
Route::put('admin/categoria/update', [CategoriaController::class,'update'])->name('updateCategoria');
Route::delete('admin/categoria/delete', [CategoriaController::class,'destroy'])->name('deleteCategoria');
Route::get('admin/categoria/getCategoria/{id}', [CategoriaController::class,'getCategoriabyID'])->name('getCategoria');
/*******************/
