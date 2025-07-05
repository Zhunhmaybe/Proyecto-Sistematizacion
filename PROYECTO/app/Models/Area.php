<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Departamento;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';
    protected $primaryKey = 'idare';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idare',
        'iddep',
        'nombreare',
    ];

    // Relación: un área pertenece a un departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'iddep');
    }

    // Relación: un área tiene muchos usuarios
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'idare');
    }
}
