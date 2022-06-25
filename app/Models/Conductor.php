<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;
    protected $table = 'conductores';
    protected $fillable = [
        'foto',
        'sexo',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function auto() {
        return $this->hasOne(Auto::class, 'conductor_id');
    }

    public function autos_pedidos() {
        return $this->hasMany(AutoPedido::class, 'conductor_id');
    }
}
