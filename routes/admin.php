<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\EmprendimientoController;
use App\Http\Controllers\PushController;
use App\Http\Controllers\Admin\OrdenesController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TelefonoDireccionController;
use App\Http\Livewire\Admin\Usuarios;
use App\Http\Livewire\Admin\CrearUsuario;
use App\Http\Livewire\Admin\EditarUsuario;
use App\Http\Controllers\ConfigController;



Route::get('/prueba', function () {
  return 'Admin';
});

Route::as('admin.')->group(function(){
    Route::get('/ordenes',[OrdenesController::class,'index'])->name('ordenes.index');
    Route::get('/ordenes/{orden}',[OrdenesController::class,'show'])->name('ordenes.show');
    
    /* CRUD Usuarios */
    Route::get('/usuarios', Usuarios::class)->name('usuarios');
    Route::get('/usuarios/crear', CrearUsuario::class)->name('usuarios.create');
    Route::get('/usuarios/{id}/editar', EditarUsuario::class)->name('usuarios.edit');
    
    Route::get('/telefono_direccion',[TelefonoDireccionController::class,'index'])->name('telefono_direccion.index');

    //CRUD Productos
    Route::get('prods', [ProductoController::class, 'index'])->middleware('auth')->name('adminProductos');
    Route::post('/prods/store', [ProductoController::class,'store'])->middleware('auth')->name('storeProductos'); 
    Route::put('/prods/update', [ProductoController::class,'update'])->middleware('auth')->name('updateTProductos');
    Route::delete('/prods/delete', [ProductoController::class,'destroy'])->middleware('auth')->name('deleteProductos');
    Route::get('/prods/getProducto/{id}', [ProductoController::class,'getProductbyID'])->middleware('auth')->name('getProducto');
    Route::get('/prods/editarImagenes/{producto:slug}', [ProductoController::class,'editarImagenes'])->middleware('auth')->name('editarImagenes');
    Route::delete('/prods/eliminarImagen', [ProductoController::class,'eliminarImagen'])->middleware('auth')->name('eliminarImagen');
    Route::post('/prods/agregarImagenes', [ProductoController::class,'agregarImagenes'])->middleware('auth')->name('agregarImagenes'); 
});

//CRUD ADMIN EMPRENDIMIENTOS
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
/*******************/

//CRUD ADMIN NEWSLETTER

  //Ver pagina del newsletter
    Route::get('/news', [NewsletterController::class, 'index'])->name('news');
  //Enviar pagina del newsletter
    Route::post('/enviar',  [NewsletterController::class, 'envio'])->name('newsletter');

    Route::post('/newsprev', [NewsletterController::class, 'newsprev'])->name('newsprev');

/*******************/
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

/* CRUD FOOTER */
Route::get('footer', [ConfigController::class,'index'])->name('footer.index');
Route::post('footer/update', [ConfigController::class,'update'])->name('footer.update'); 

/*NOTIFICACION PUSH */
Route::get('/sendpush', [PushController::class, 'index'])->name('sendpush');
Route::post('/push', [PushController::class, 'push'])->name('push');
/*********************/



