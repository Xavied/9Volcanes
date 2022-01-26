<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\EmprendimientoController;

use App\Http\Controllers\Admin\OrdenesController;


Route::get('/prueba', function () {
  return 'Admin';
});

Route::as('admin.')->group(function(){
    Route::get('/ordenes',[OrdenesController::class,'index'])->name('ordenes.index');
    Route::get('/ordenes/{orden}',[OrdenesController::class,'show'])->name('ordenes.show');
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

//NEWSLETTER
// {
  //Ver pagina del newsletter
    Route::get('/news', [NewsletterController::class, 'index'])->name('news');
  //Enviar pagina del newsletter
    Route::post('/enviar',  [NewsletterController::class, 'envio'])->name('newsletter');
//}
