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
        Schema::create('user', function($table){
            $table->increments('idUser');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('rg');
            $table->string('cpf');
            $table->string('endereco');
            $table->integer('numero');
            $table->string('bairro');
            $table->string('complemento');
            $table->string('uf');
            $table->string('telefone');
            $table->string('email')->nullable(false);
            $table->string('senha')->nullable(false);
            $table->string('idCartao');
            $table->string('idPix');
            $table->binary('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
