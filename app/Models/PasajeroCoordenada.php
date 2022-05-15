<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasajeroCoordenada extends Model
{
    use HasFactory;

    protected $table = 'pasajeros_coordenadas';
    protected $fillable = [
        'esFavorito',
        'pasajero_id',
        'coordenada_id',
        'linea_id'
    ];

    public function coordenadas() {
        return $this->belongsTo(Coordenada::class, 'coordenada_id');
    }

    public function lineas() {
        return $this->belongsTo(Linea::class, 'linea_id');
    }

    public function pasajero() {
        return $this->belongsTo(Pasajero::class, 'pasajero_id');
    }
}
