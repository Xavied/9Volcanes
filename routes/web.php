<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\EmprendimientoController;

use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PushController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HomeController::class, 'index'])->name('home');
//Productos
Route::get('/productos', [ProductoController::class,'productos'])->name('productos');
Route::get('/productos/{productoe:slug}', [ProductoController::class,'producto'])->name('producto');
Route::get('/categorias/{categoria:slug}', [ProductoController::class,'categoria'])->name('categoria');

//CRUD Productos
// Route::get('prods', [ProductoController::class, 'index'])->middleware('auth')->name('adminProductos');
// Route::post('/prods/store', [ProductoController::class,'store'])->middleware('auth')->name('storeProductos'); 
// Route::put('/prods/update', [ProductoController::class,'update'])->middleware('auth')->name('updateTProductos');
// Route::delete('/prods/delete', [ProductoController::class,'destroy'])->middleware('auth')->name('deleteProductos');
// Route::get('/prods/getProducto/{id}', [ProductoController::class,'getProductbyID'])->middleware('auth')->name('getProducto');
// Route::get('/prods/editarImagenes/{producto:slug}', [ProductoController::class,'editarImagenes'])->middleware('auth')->name('editarImagenes');
// Route::delete('/prods/eliminarImagen', [ProductoController::class,'eliminarImagen'])->middleware('auth')->name('eliminarImagen');
// Route::post('/prods/agregarImagenes', [ProductoController::class,'agregarImagenes'])->middleware('auth')->name('agregarImagenes'); 


Route::get('/home', [HomeController::class, 'index'])->name('home');


//Emprendimientos{
Route::get('/emprendimientos', [EmprendimientoController::class, 'index'])->name('emprendimientos.index');
Route::get('/emprendimientos/{marcae:slug}', [EmprendimientoController::class,'unemprend'])->name('emprend');

//}

//CRUD CLIENTE
Route::get('/clientes', [ClientesController::class, 'index'])->middleware('auth');
Route::post('/clientes/store', [ClientesController::class,'store'])->middleware('auth')->name('storeCliente');
Route::put('/clientes/update', [ClientesController::class,'update'])->middleware('auth')->name('updateCliente');
Route::delete('/clientes/delete', [ClientesController::class,'destroy'])->middleware('auth')->name('deleteCliente');
Route::get('/clientes/getCliente/{id}', [ClientesController::class,'getClientebyID'])->middleware('auth')->name('getClientes'); 

Route::get('/nosotros', function () {
    return view('nosotros');
});



//NEWSLETTER
//Ruta de registro al Nesletter
Route::post('/suscribir', [NewsletterController::class, 'suscribir'])->name('susnews');

    
//Rutas de administracion



/*Compras */
Route::get('/carrito-de-compras', [CarritoController::class,'show'])->name('carrito-de-compras');

Route::middleware(['auth'])->group(function(){
    Route::get('/ordenes',[OrdenesController::class,'index'])->name('ordenes.index');
    Route::get('/ordenes/crear', [OrdenesController::class, 'create'])->name('ordenes.crear');
    Route::get('/ordenes/{orden}',[OrdenesController::class,'show'])->name('ordenes.show');
    Route::get('/ordenes/{orden}/pagar',[OrdenesController::class, 'pagar'])->name('ordenes.pagar');
});
Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth'])->name('admin');

/*Rutas para la notificacion webpush*/
Route::post('/pushstore', [App\Http\Controllers\PushController::class, 'pushstore'])->name('pushstore');
require __DIR__ . '/auth.php';
