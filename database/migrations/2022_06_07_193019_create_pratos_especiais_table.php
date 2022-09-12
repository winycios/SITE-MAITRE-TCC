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
        Schema::create('pratos_especiais', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('foto', 400)->nullable();
            $table->string('descPrato');
            $table->float('valor');
            $table->integer('especial')->default(1);
            $table->foreignId('dia_semana_id')->constrained();
            $table->foreignId('categoria_id')->constrained();
            $table->foreignId('restaurante_id')->constrained();
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
        Schema::dropIfExists('pratos_especiais');
    }
};
