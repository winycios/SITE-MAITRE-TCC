<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at']; 

    protected $fillable = [
        'nome',
        'endereco',
        'estado',
        'bairro',
        'cidade',
        'numero',
        'cpf',
        'cep',
        'user_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rules(){
        return [
            "nome" => 'required|string',
            "cpf" => 'required|string|unique:clientes',
            "endereco" => 'required|string',
            "numero" => 'required|integer',
            "bairro" => 'required|string',
            "cidade" => 'required|string',
            "estado" => 'required|string',
            "cep" => 'required|string',
            "user_id" => 'required|integer'
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
        ];
    }
}
