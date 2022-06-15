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
        'user_id',
    ];

    public function users() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function autos() {
        return $this->hasMany(Auto::class, 'conductor_id');
    }
}
