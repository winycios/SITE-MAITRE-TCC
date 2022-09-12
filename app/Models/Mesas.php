<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mesas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mesas';
    protected $fillable = [
        'mesa',
        'capacidade',
        'disponivel',
        'restaurante_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'restaurante_id' => 'integer',
    ];

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }

    public function rules($id){
        return [
            //"mesa" => 'required|unique:mesas,restaurante_id,'.$id
            //"mesa" => 'required|unique:mesas'
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
        ];
    }
}
