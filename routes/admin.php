<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\OrdenesController;


Route::get('/prueba', function () {
  return 'Admin';
});

Route::as('admin.')->group(function(){
    Route::get('/ordenes',[OrdenesController::class,'index'])->name('ordenes.index');
    Route::get('/ordenes/{orden}',[OrdenesController::class,'show'])->name('ordenes.show');
});
