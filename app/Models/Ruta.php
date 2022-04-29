<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $table = 'rutas';
    protected $fillable = [
        'origen',
        'destino'
    ];

    public function lineas() {
        return $this->hasMany(Linea::class, 'ruta_id');
    }
}
