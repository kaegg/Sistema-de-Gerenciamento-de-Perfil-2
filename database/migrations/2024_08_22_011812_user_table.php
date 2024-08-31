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
        Schema::create('usuario', function(Blueprint $table){
            $table->bigIncrements('idUsuario');
            $table->string('nome', length: 20);
            $table->string('sobrenome', length: 50);
            $table->string('rg', length: 20);
            $table->string('cpf', length: 14);
            $table->string('endereco', length: 50);
            $table->integer('numero');
            $table->string('bairro', length: 50);
            $table->string('complemento', length: 20);
            $table->string('uf', length: 2);
            $table->string('telefone', length: 14);
            $table->string('email', length: 100)->nullable(false);
            $table->string('senha', length: 100)->nullable(false);
            $table->foreignId('idCartao');
            $table->foreignId('idPix');
            $table->binary('foto');
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
        Schema::drop('usuario');
    }
};
