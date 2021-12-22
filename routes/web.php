<?php


use App\Http\Controllers\CategoriaController;
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

//CRUD Productos
Route::get('prods', [ProductoController::class, 'index'])->middleware('auth');
Route::post('/prods/store', [ProductoController::class,'store'])->middleware('auth')->name('storeProductos'); 
Route::put('/prods/update', [ProductoController::class,'update'])->middleware('auth')->name('updateTProductos');
Route::delete('/prods/delete', [ProductoController::class,'destroy'])->middleware('auth')->name('deleteProductos');
Route::get('/prods/getProducto/{id}', [ProductoController::class,'getProductbyID'])->middleware('auth')->name('getProducto');
Route::get('/prods/editarImagenes/{producto:slug}', [ProductoController::class,'editarImagenes'])->middleware('auth')->name('editarImagenes');
Route::delete('/prods/eliminarImagen', [ProductoController::class,'eliminarImagen'])->middleware('auth')->name('eliminarImagen');
Route::post('/prods/agregarImagenes', [ProductoController::class,'agregarImagenes'])->middleware('auth')->name('agregarImagenes'); 


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
Route::delete('/emprends/delete', [EmprendimientoController::class, 'destroy'])->name('deleteEmprendimientos');
//Ruta para actualizar el emprendimiento
Route::put('/emprends/update', [EmprendimientoController::class, 'update'])->name('updateEmprendimientos');
//Ruta para obtener un emprendimiento y hacer el autollenado en update
Route::get('/empreds/getEmprendimiento/{id}', [EmprendimientoController::class,'getEmprendimientobyID'])->name('getEmprendimiento');

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
Route::post('/categoria/store', [CategoriaController::class,'store'])->middleware('auth')->name('storeCategoria'); 
Route::put('/categoria/update', [CategoriaController::class,'update'])->middleware('auth')->name('updateCategoria');
Route::delete('/categoria/delete', [CategoriaController::class,'destroy'])->middleware('auth')->name('deleteCategoria');
Route::get('/categoria/getCategoria/{id}', [CategoriaController::class,'getCategoriabyID'])->name('getCategoria');

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

require __DIR__ . '/auth.php';
