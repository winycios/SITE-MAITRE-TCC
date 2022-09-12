<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'diaSemana',
        'horario',
        'data',
        'qtdPessoas',
        'restaurante_id',
        'cliente_id',
        'status_reserva_id',
    ];

    
    protected $casts = [
        'id' => 'integer',
        'cliente_id' => 'integer',
        'restaurante_id' => 'integer',
        'status_reserva_id' => 'integer'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }

    public function status()
    {
        return $this->belongsTo(StatusReserva::class);
    }
}
