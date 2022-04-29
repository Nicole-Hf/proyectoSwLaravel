<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;

    protected $table = 'lineas';
    protected $fillable = [
        'linea',
        'horaInicio',
        'horaFinal',
        'ruta_id'
    ];

    public function rutas() {
        return $this->belongsTo(Ruta::class, 'ruta_id');
    }

    public function micros() {
        return $this->hasMany(Micro::class, 'linea_id');
    }

    public function pasajeroCoordenada() {
        return $this->hasMany(PasajeroCoordenada::class, 'linea_id');
    }
}
