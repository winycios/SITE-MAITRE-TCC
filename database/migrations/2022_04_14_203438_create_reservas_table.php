<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->time('horario');
            $table->date('data');
            $table->string('diaSemana');
            $table->integer('qtdPessoas');
            $table->timestamp('horaCheckIn')->nullable();
            $table->timestamp('horaCheckOut')->nullable();
            $table->Time('duracao')->nullable();
            $table->foreignId('restaurante_id')->constrained();
            $table->foreignId('cliente_id')->constrained();
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
        Schema::dropIfExists('reservas');
    }
}
