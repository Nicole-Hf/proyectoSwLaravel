<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';
    protected $fillable = [
        'tarifa',
        'latitud_origen',
        'latitud_destino',
        'longitud_origen',
        'longitud_destino',
        'pasajero_id',
        'pago_id',
    ];

    public function pasajeros() {
        return $this->belongsTo(Pasajero::class, 'pasajero_id');
    }

    public function pagos() {
        return $this->belongsTo(FormaPago::class, 'pago_id');
    }

    public function autos_pedidos() {
        return $this->hasMany(AutoPedido::class, 'pedido_id');
    }
}
