<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Categoria;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('descCategoria')->unique();
            $table->timestamps();
        });

            $categorias =  array(
            [
                'descCategoria' => 'Entradas',
            ],
            [
                'descCategoria' => 'Saladas',
            ],
            [
                'descCategoria' => 'Sobremesas',
            ],
            [
                'descCategoria' => 'Guarnição',
            ],
            [
                'descCategoria' => 'Aperitivos',
            ],
            [
                'descCategoria' => 'Bebidas',
            ],
            [
                'descCategoria' => 'Sopas',
            ],
            [
                'descCategoria' => 'Carnes',
            ],
            [
                'descCategoria' => 'Principais',
            ],
            [
                'descCategoria' => 'Vegetariano',
            ],
            [
                'descCategoria' => 'Vegano',
            ],
        );
        foreach ($categorias as $categoria){
            $cat = new Categoria(); 
            $cat->descCategoria =$categoria['descCategoria'];
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
        Schema::dropIfExists('categorias');
    }
}
