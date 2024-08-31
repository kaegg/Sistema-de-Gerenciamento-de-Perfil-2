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
        Schema::create('cartao', function(Blueprint $table){
            $table->bigIncrements('idCartao');
            $table->foreignId('idUsuario');
            $table->string('numeroCartao', length: 50);
            $table->date('validade');
            $table->integer('cvv');
            $table->string('tipo', length: 1);
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
        Schema::drop('cartao');
    }
};
