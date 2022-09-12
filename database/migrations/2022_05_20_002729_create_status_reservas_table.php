<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\StatusReserva;

class CreateStatusReservasTable extends Migration
{
    
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('status_reservas', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();


           $data =  array(
            [
                'status' => 'Pedido de reserva enviado',
            ],
            [
                'status' => 'Pedido Confirmado',
            ],
            [
                'status' => 'Cancelado pelo restaurante',
            ],
            [
                'status' => 'Cancelado pelo cliente',
            ],
            [
                'status' => 'Em andamento',
            ],
            [
                'status' => 'Finalizado',
            ],
        );
        foreach ($data as $datum){
            $dia = new StatusReserva(); 
            $dia->status =$datum['status'];
            $dia->save();
        }
    }


    public function down()
    {
        Schema::dropIfExists('status_reservas');
    }
}
