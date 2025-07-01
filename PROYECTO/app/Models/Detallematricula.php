<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matricula;
use App\Models\Asignatura;
use App\Models\Tutoria;

class Detallematricula extends Model
{
    use HasFactory;
    protected $table = 'detallematriculas';
    protected $primaryKey = 'iddet';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'iddet',
        'idasi',
        'idmat',
        'detalledet',
    ];

    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'idmat');
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'idasi');
    }

    public function tutorias()
    {
        return $this->hasMany(Tutoria::class, 'iddet');
    }
}
