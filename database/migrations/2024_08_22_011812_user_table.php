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
        if (!Schema::hasTable('usuario')) {
            Schema::create('usuario', function (Blueprint $table) {
                $table->bigIncrements('idUsuario')->unsigned();
                $table->string('nome')->nullable();
                $table->string('sobrenome')->nullable();
                $table->string('rg')->nullable();
                $table->string('cpf')->nullable();
                $table->string('cep')->nullable();
                $table->string('endereco')->nullable();
                $table->integer('numero')->nullable();
                $table->string('bairro')->nullable();
                $table->string('complemento')->nullable();
                $table->string('uf')->nullable();
                $table->string('telefone')->nullable();
                $table->string('email')->unique();
                $table->string('senha');
                $table->unsignedBigInteger('idCartao')->nullable();
                $table->unsignedBigInteger('idPix')->nullable();
                $table->binary('foto')->nullable();
                $table->timestamps();

                $table->foreign('idCartao')->references('id')->on('cartao')->onDelete('set null');
                $table->foreign('idPix')->references('id')->on('pix')->onDelete('set null');
            });
        }
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
