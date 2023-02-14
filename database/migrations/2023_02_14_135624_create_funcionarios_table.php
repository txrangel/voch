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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('email');
            $table->date('data_nascimento');
            $table->char('idade', 2);
            $table->char('documento', 11);
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('unidade_id')->unsigned();
            //$table->bigInteger('endereco_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('unidade_id')->references('id')->on('unidades');
            //$table->foreign('endereco_id')->references('id')->on('enderecos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
};
