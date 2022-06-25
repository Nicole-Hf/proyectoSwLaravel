<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    use HasFactory;
    protected $table = 'formas_pagos';
    protected $fillable = [
        'tipo',
    ];

    public function pedido() {
        return $this->hasOne(Pedidos::class, 'pago_id');
    }
}
