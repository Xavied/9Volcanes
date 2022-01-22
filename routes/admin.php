<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\OrdenesController;
use App\Http\Controllers\CategoriaController;


Route::get('/prueba', function () {
  return 'Admin';
});

Route::as('admin.')->group(function(){
    Route::get('/ordenes',[OrdenesController::class,'index'])->name('ordenes.index');
    Route::get('/ordenes/{orden}',[OrdenesController::class,'show'])->name('ordenes.show');
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
