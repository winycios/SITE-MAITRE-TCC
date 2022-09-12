<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;


    protected $fillable = [
        'descCategoria',
    ];


    protected $casts = [
        'id' => 'integer',
    ];


    public function rules(){
        return [
            "descCategoria" => 'required|string|unique:categorias',
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'descCategoria.unique' => 'Está categoria já existe',
        ];
        
    }
}
