<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolUser extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = [
        'user_id',
        'rol_id'
    ];

    public function roles() {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
