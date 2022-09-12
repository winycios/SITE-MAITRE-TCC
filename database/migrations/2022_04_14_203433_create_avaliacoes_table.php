<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->integer('estrelas');
            $table->string('descAvaliacao');
            $table->foreignId('restaurante_id')->onDelete('cascade')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

   
    public function down()
    {
        Schema::dropIfExists('avaliacoes');
    }
}
