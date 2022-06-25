<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;
    protected $table = 'comprobantes';
    protected $fillable = [
        'monto',
        'fecha',
        'origen',
        'destino',
        'pago_id',
    ];

    public function pago() {
        return $this->belongsTo(FormaPago::class, 'pago_id');
    }
}
