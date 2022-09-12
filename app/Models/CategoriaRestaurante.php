<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaRestaurante extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria',
    ];


    protected $casts = [
        'id' => 'integer',
    ];


    public function rules(){
        return [
            "categoria" => 'required|string|unique:categoria_restaurantes',
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'categoria.unique' => 'Está categoria já existe',
        ];
        
    }
}
