<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\Rol;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'idusu';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idusu',
        'nombredusu',
        'apellidousu',
        'contrasena',
        'email',
        'fechanacimiento',
        'idare',
        'idrol',
    ];

    protected $hidden = [
        'contrasena',
    ];

    // Relación: un usuario pertenece a un área (opcional)
    public function area()
    {
        return $this->belongsTo(Area::class, 'idare');
    }

    // Relación: un usuario pertenece a un rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idrol');
    }
}
