<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\Rol;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;

class Usuario extends Authenticatable implements CanResetPassword
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

    public function area()
    {
        return $this->belongsTo(Area::class, 'idare');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idrol');
    }
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}
