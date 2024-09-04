<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario', function(Blueprint $table){
            $table->bigIncrements('idComentario');
            $table->foreignId('idUsuario');
            $table->string('comentario', length: 500);
            $table->integer('like')->default(0);
            $table->integer('deslike')->default(0);
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
        Schema::drop('comentario');
    }
};
