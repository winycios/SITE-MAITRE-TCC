<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacoes';
    protected $fillable = [
        'estrelas',
        'descAvaliacao',
        'restaurante_id',
        'user_id'
    ];


    protected $casts = [
        'id' => 'integer',
        'restaurante_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rules(){
        return [
            "estrelas" => "required|integer",
            "descAvaliacao" => 'required|string',
            "restaurante_id" => "required|integer",
           // "user_id" => "required|integer",

        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
        ];
        
    }
}
