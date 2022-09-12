<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'dia_semana_id',
        'horario',
        'restaurante_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'dia_semana_id' => 'integer',
        'restaurante_id' => 'integer',
    ];

    public function dia_semana()
    {
        return $this->belongsTo(DiaSemana::class);
    }
    
    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }

    public function rules(){
        return [
            "dia_semana_id" => 'required|integer',
            "horario" => 'required|string',
            "restaurante_id" => 'required|integer',
           
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
        ];
    }
}
