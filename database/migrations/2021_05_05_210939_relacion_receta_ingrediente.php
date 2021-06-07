<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelacionRecetaIngrediente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receta_ingredientes', function (Blueprint $table) {
            $table->increments('id_receta_ingrediente');
            $table->integer('id_ingrediente');
            $table->foreign('id_ingrediente')->references('id_ingrediente')->on('ingrediente');
            $table->integer('id_receta');
            $table->foreign('id_receta')->references('id_receta')->on('receta');
            $table->text('cantidad');

            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receta_ingredientes');
    }
}
