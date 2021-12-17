<?php

use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EmprendimientoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\OrdenesController;

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
    

Route::get('/carrito-de-compras', [CarritoController::class,'show'])->name('carrito-de-compras');

Route::middleware(['auth'])->group(function(){
    Route::get('/ordenes',[OrdenesController::class,'index'])->name('ordenes.index');
    Route::get('/ordenes/crear', [OrdenesController::class, 'create'])->name('ordenes.crear');
    Route::get('/ordenes/{orden}',[OrdenesController::class,'show'])->name('ordenes.show');
    Route::get('/ordenes/{orden}/pagar',[OrdenesController::class, 'pagar'])->name('ordenes.pagar');
});


require __DIR__ . '/auth.php';
