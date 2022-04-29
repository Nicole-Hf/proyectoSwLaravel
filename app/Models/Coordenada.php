<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordenada extends Model
{
    use HasFactory;

    protected $table = 'coordenadas';
    protected $fillable = [
        'latitudOrigen',
        'latitudDestino',
        'longitudOrigen',
        'longitudDestino'
    ];

    public function pasajerosCoordenadas() {
        return $this->hasMany(PasajeroCoordenada::class, 'coordenada_id');
    }
}
