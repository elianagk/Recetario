<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Receta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('receta', function (Blueprint $table) {
           
            $table->increments('id_receta');
            $table->string('nombre');
            $table->text('descripcion');
            $table->text('recomendacion')->nullable();
            $table->integer('comensales');
            $table->string('tiempo_coccion',20);
            $table->string('dificultad');
            $table->binary('image')->nullable();
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
           
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
        Schema::dropIfExists('categoria');
        Schema::dropIfExists('receta');
        
    }
}
