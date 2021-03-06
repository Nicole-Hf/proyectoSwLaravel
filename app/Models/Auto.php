<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;
    protected $table = 'autos';
    protected $fillable = [
        'modelo',
        'placa',
        'color',
        'servicio',
        'conductor_id',
    ];

    public function conductores() {
        return $this->belongsTo(Conductor::class, 'conductor_id');
    }
}
