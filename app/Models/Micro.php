<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Micro extends Model
{
    use HasFactory;

    protected $table = 'micros';
    protected $fillable = [
        'descripcion',
        'placa',
        'interno',
        'chofer_id',
        'linea_id'
    ];

    public function linea() {
        return $this->belongsTo(Linea::class, 'linea_id');
    }

    public function chofer() {
        return $this->belongsTo(User::class, 'chofer_id');
    }
}
