<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    use HasFactory;
    protected $table = 'pasajeros';
    protected $fillable = [
        'telefono',
        'user_id',
    ];

    public function users() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function viajes() {
        return $this->hasMany(Viaje::class, 'pasajero_id');
    }
}
