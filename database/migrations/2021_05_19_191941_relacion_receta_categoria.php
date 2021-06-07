<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelacionRecetaCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receta_categoria', function (Blueprint $table) {
            $table->increments('id_receta_categoria');
            $table->integer('id_categoria');
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria');
            $table->integer('id_receta');
            $table->foreign('id_receta')->references('id_receta')->on('receta');
            

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
        Schema::dropIfExists('receta_categoria');
    }
}
