<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    use HasFactory;
    protected $table = 'pasajeros';
    protected $fillable = [
        'fechaNacimiento',
        'user_id',
    ];

    public function users() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function pedidos() {
        return $this->hasMany(Pedido::class, 'pasajero_id');
    }
}
