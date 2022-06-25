<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoPedido extends Model
{
    use HasFactory;
    protected $table = 'autos_pedidos';
    protected $fillable = [
        'fecha',
        'hora',
        'monto',
        'aceptado',
        'conductor_id',
        'pedido_id'
    ];

    public function conductores() {
        return $this->belongsTo(Conductor::class, 'conductor_id');
    }

    public function pedidos() {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }
}
