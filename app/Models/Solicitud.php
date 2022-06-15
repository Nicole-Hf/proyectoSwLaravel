<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $table = 'solicitudes';
    protected $fillable = [
        'monto',
        'auto_id',
        'viaje_id',
    ];

    public function autos() {
        return $this->belongsTo(Auto::class, 'auto_id');
    }

    public function viajes() {
        return $this->belongsTo(Viaje::class, 'viaje_id');
    }
}
