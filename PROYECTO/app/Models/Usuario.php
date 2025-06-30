<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'idusu';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false; // ✅ desactiva created_at y updated_at

    protected $fillable = [
        'idusu',
        'nombredusu',
        'apellidousu',
        'contrasena',
        'email',
        'fechanacimiento',
        'idare',
        'idrol'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'idare');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idrol');
    }
}
