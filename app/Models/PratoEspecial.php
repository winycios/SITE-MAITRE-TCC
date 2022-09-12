<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PratoEspecial extends Model
{
    use HasFactory;

    protected $table = 'pratos_especiais';

    protected $fillable = [
        'nome',
        'foto',
        'descPrato',
        'valor',
        'categoria_id',
        'dia_semana_id',
        'restaurante_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'valor' => 'float',
        'categoria_id' => 'integer',
        'dia_semana_id' => 'integer',
        'restaurante_id' => 'integer',
    ];

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }

    public function dia_semana()
    {
        return $this->belongsTo(DiaSemana::class);
    }
}
