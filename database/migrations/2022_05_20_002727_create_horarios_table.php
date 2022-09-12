<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{

    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->time('horario');
            $table->foreignId('dia_semana_id')->constrained();
            $table->foreignId('restaurante_id')->onDelete('cascade')->constrained();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
