<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use Notifiable;

    protected $table = 'users';          // El nombre de la tabla en la base de datos
    protected $primaryKey = 'idusu';        // Clave primaria de la tabla
    public $incrementing = false;         // Si el id es autoincremental
    protected $keyType = 'string';          // Tipo de la clave primaria
    public $timestamps = false;

    protected $fillable = [
        'idusu',
        'nombredusu',
        'apellidousu',
        'contrasena',
        'email',
        'fechanacimiento',
        'idrol',
        'remember_token',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
