<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\DiaSemana;

class CreateDiaSemanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_semanas', function (Blueprint $table) {
            $table->id();
            $table->string('diaSemana');
            $table->timestamps();
        });

        $data =  array(
            [
                'diaSemana' => 'Domingo',
            ],
            [
                'diaSemana' => 'Segunda-Feira',
            ],
            [
                'diaSemana' => 'Terça-Feira',
            ],
            [
                'diaSemana' => 'Quarta-Feira',
            ],
            [
                'diaSemana' => 'Quinta-Feira',
            ],
            [
                'diaSemana' => 'Sexta-Feira',
            ],
            [
                'diaSemana' => 'Sábado',
            ],
        );
        foreach ($data as $datum){
            $dia = new DiaSemana(); 
            $dia->diaSemana =$datum['diaSemana'];
            $dia->save();
        }
    }
    public function down()
    {
        Schema::dropIfExists('dia_semanas');
    }
}
