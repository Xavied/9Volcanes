<?php

use App\Models\Orden;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('contacto');
            $table->string('telefono');    
            $table
            ->enum('estado', [
              Orden::PENDIENTE,
              Orden::RECIBIDO,
              Orden::ENVIADO,
              Orden::ENTREGADO,
              Orden::ANULADO,
            ]);
            $table->enum('tipo_de_envio', [Orden::RETIRO, Orden::ENVIAR]);
            $table->float('costo_de_envio');
            $table->float('total'); //Total a pagar.
            $table->json('contenido');
            
            $table->unsignedBigInteger('provincia_id')->nullable();
            $table
              ->foreign('provincia_id')
              ->references('id')
              ->on('provincias')
              ->nullOnDelete();

            $table->unsignedBigInteger('ciudad_id')->nullable();
            $table
              ->foreign('ciudad_id')
              ->references('id')
              ->on('ciudads')
              ->nullOnDelete();
            
            $table->string('direccion_de_envio')->nullable();
            $table->string('referencia')->nullable();  
              
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
        Schema::dropIfExists('ordens');
    }
}
