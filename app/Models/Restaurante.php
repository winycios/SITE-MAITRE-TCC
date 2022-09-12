<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurante extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    //protected $cascadeDeletes = ['user'];
    protected $dates = ['deleted_at']; 
    
    protected $fillable = [
        'nome',
        'descricao',
        'endereco',
        'bairro',
        'cidade',
        'estado',
        'foto',
        'cep',
        'numero',
        'level',
        'categoria_restaurante_id',
        'user_id',
    ];

   
    protected $casts = [
        'id' => 'integer',
        'categoria_restaurante_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function categoria_restaurante()
    {
        return $this->belongsTo(CategoriaRestaurante::class);
    }

    public function user()
    {
        return $this->withTrashed()->belongsTo(User::class);
    }

    public function rules(){
        return [
            "nome" => 'required|string',
            "endereco" => 'required|string',
            "numero" => 'required|integer',
            "bairro" => 'required|string',
            "cidade" => 'required|string',
            "estado" => 'required|string',
            "foto" => 'required|file|mimes:png,jpg,jpeg',
            "cep" => 'required|string',
            "level" => 'required|integer',
            "categoria_restaurante_id" => 'required|integer',
            "user_id" => 'required|integer|unique:restaurantes',
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'user_id.unique' => 'Este usuário já possuí um restaurante',
        ];
    }
}
