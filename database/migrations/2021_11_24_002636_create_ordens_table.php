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
            $table
            ->enum('estado', [
              Orden::PENDIENTE,
              Orden::RECIBIDO,
              Orden::ENVIADO,
              Orden::ENTREGADO,
              Orden::ANULADO,
            ]);
            $table->enum('tipEntrega', [Orden::RETIRO, Orden::ENVIAR]);
            $table->string('direccionEmtrega')->nullable();
            $table->float('Total'); //Total a pagar.
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
