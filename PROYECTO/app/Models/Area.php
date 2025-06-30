<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $primaryKey = 'idare'; // porque no es 'id'
    public $incrementing = false; // porque es tipo char
    protected $keyType = 'string';

    protected $fillable = [
        'idare',
        'iddep',
        'nombreare'
    ];

    // Relación con Departamento (opcional)
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'iddep');
    }

    // Relación con usuarios (opcional)
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'idare');
    }
}
