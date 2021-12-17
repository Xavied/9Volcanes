<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EmprendimientoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Productos
Route::get('/productos', [ProductoController::class,'productos'])->name('productos');
Route::get('/productos/{productoe:slug}', [ProductoController::class,'producto'])->name('producto');
Route::get('/categorias/{categoria:slug}', [ProductoController::class,'categoria'])->name('categoria');
//CRUD Productos
Route::get('prods', [ProductoController::class, 'index'])->middleware('auth');
Route::post('/prods/store', [ProductoController::class,'store'])->middleware('auth')->name('storeProductos'); 
Route::put('/prods/update', [ProductoController::class,'update'])->middleware('auth')->name('updateTProductos');
Route::delete('/prods/delete', [ProductoController::class,'destroy'])->middleware('auth')->name('deleteProductos');



Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/emprendimientos', [EmprendimientoController::class, 'index'])->name('emprendimientos.index');
Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Ver pagina del newsletter
Route::get('/news', [NewsletterController::class, 'index']);
//Enviar pagina del newsletter
Route::post('/enviar',  [NewsletterController::class, 'envio'])->name('newsletter');
    
//Rutas de administracion

Route::resource('categoria/',CategoriaController::class)->middleware('auth');
Route::resource('categoria',\App\Http\Controllers\CategoriaController::class)->middleware('auth');
Route::post('/categoria/store', [CategoriaController::class,'store'])->middleware('auth')->name('storeCategoria'); 
Route::put('/categoria/update', [CategoriaController::class,'update'])->middleware('auth')->name('updateCategoria');
Route::delete('/categoria/delete', [CategoriaController::class,'destroy'])->middleware('auth')->name('deleteCategoria');
Route::get('/categoria/getCategoria/{id}', [CategoriaController::class,'getCategoriabyID'])->name('getCategoria');



require __DIR__ . '/auth.php';
