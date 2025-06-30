<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'idrol';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idrol',
        'detalle',
    ];

    // Relación: un rol tiene muchos usuarios
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'idrol');
    }
}
