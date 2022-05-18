<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;

    protected $table = 'conductores';
    protected $fillable = [
        'telefono',
        'user_id',
    ];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function micros() {
        return $this->hasMany(Micro::class, 'conductor_id');
    }

    public function getUser($user) {
        return $this->where(['user_id' => $user])->first();
    }
}
