<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesor;
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

    public function profesor()
    {

        return $this->hasMany(Profesor::class, 'idare');
    }

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class, 'idare', 'idare');
    }
    // En app/Models/Area.php
    public function users()
    {
        return $this->hasMany(User::class, 'idare', 'idare');
    }
}
