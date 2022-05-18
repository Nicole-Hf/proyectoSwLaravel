<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Micro extends Model
{
    use HasFactory;

    protected $table = 'micros';
    protected $fillable = [
        'placa',
        'modelo',
        'servicios',
        'interno',
        'capacidad',
        'conductor_id',
        'linea_id'
    ];

    public function linea() {
        return $this->belongsTo(Linea::class, 'linea_id');
    }

    public function conductor() {
        return $this->belongsTo(Conductor::class, 'conductor_id');
    }

    public function getBus($bus) {
        return $this->where(['conductor_id' => $bus])->get();
    }
}
