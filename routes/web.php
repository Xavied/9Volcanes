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
Route::get('prods', [ProductoController::class, 'index']);
Route::post('/prods/store', [ProductoController::class,'store'])->name('storeProductos'); 
Route::put('/prods/update', [ProductoController::class,'update'])->name('updateTProductos');
Route::delete('/prods/delete', [ProductoController::class,'destroy'])->name('deleteProductos');
Route::get('/prods/getProducto/{id}', [ProductoController::class,'getProductbyID'])->name('getProducto');



Route::get('/home', [HomeController::class, 'index'])->name('home');


//Emprendimientos{
Route::get('/emprendimientos', [EmprendimientoController::class, 'index'])->name('emprendimientos.index');
Route::get('/emprendimientos/{marcae:slug}', [EmprendimientoController::class,'unemprend'])->name('emprend');

//CRUD ADMIN
//{
//Ruta para ver todos los emprendimientos
Route::get('/emprends', [EmprendimientoController::class, 'show'])->name('showEmprendimientos');
//Ruta para guardar el emprendimiento
Route::post('/emprends/store', [EmprendimientoController::class, 'storage'])->name('storeEmprendimientos');
//Ruta para borrar un emprendimiento
Route::post('/emprends/delete', [EmprendimientoController::class, 'destroy'])->name('deleteEmprendimientos');
//Ruta para actualizar el emprendimiento
Route::post('/emprends/update', [EmprendimientoController::class, 'update'])->name('updateEmprendimientos');

//}
//}

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//NEWSLETTER
//Ruta de registro al Nesletter
Route::post('/suscribir', [NewsletterController::class, 'suscribir'])->name('susnews');
//Ver pagina del newsletter
Route::get('/news', [NewsletterController::class, 'index']);
//Enviar pagina del newsletter
Route::post('/enviar',  [NewsletterController::class, 'envio'])->name('newsletter');
    
//Rutas de administracion

Route::resource('categoria/',CategoriaController::class)->middleware('auth');
Route::resource('categoria',\App\Http\Controllers\CategoriaController::class)->middleware('auth');





require __DIR__ . '/auth.php';
