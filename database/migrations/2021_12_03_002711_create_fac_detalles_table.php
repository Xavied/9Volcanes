<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fac_detalles', function (Blueprint $table) {
            $table->id();
            $table->integer('Cantidad');
            

            //key foreanea del encabezado factura
            $table->unsignedBigInteger('facencabs_id');
            $table->foreign('facencabs_id')->references('id')->on('fac_encabs');

            //key foreanea de la orden
            $table->unsignedBigInteger('orden_id');            
            $table->foreign('orden_id')->references('id')->on('ordens');

            //key foreanea del producto
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fac_detalles');
    }
}
