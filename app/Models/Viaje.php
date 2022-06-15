<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    use HasFactory;
    protected $table = 'viajes';
    protected $fillable = [
        'tarifa',
        'latO',
        'longO',
        'latD',
        'longD',
        'pasajero_id',
    ];

    public function pasajeros() {
        return $this->belongsTo(Pasajero::class,'pasajero_id');
    }

    public function solicitudes() {
        return $this->hasMany(Solicitud::class, 'viaje_id');
    }
}
