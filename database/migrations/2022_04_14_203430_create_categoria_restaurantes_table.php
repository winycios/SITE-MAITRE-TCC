<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\CategoriaRestaurante;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_restaurantes', function (Blueprint $table) {
            $table->id();
            $table->string('categoria')->unique();
            $table->timestamps();
        });

           $categorias =  array(
            [
                'categoria' => 'Pizzaria',
            ],
            [
                'categoria' => 'Oriental',
            ],
            [
                'categoria' => 'Hamburgueria',
            ],
            [
                'categoria' => 'Frutos do mar',
            ],
            [
                'categoria' => 'Buffet',
            ],
            [
                'categoria' => 'Volante',
            ],
            [
                'categoria' => 'Rodízio',
            ],
        );
        foreach ($categorias as $categoria){
            $cat = new CategoriaRestaurante(); 
            $cat->categoria =$categoria['categoria'];
            $cat->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_restaurantes');
    }
};
