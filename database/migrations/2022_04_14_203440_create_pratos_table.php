<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('pratos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('foto', 400)->nullable();
            $table->string('descPrato');
            $table->float('valor');
            $table->foreignId('categoria_id')->constrained();
            $table->foreignId('restaurante_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pratos');
    }
}
