<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InscripcionController extends Model
{
    protected $table = 'inscripcion_tutorias';
    protected $primaryKey = 'idins';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idins',
        'idest',
        'idtut',
        'fechains'
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'idest', 'idest');
    }

    public function tutoria()
    {
        return $this->belongsTo(Tutoria::class, 'idtut', 'idtut');
    }
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'idhor', 'idhor');
    }

    public function dia()
    {
        return $this->belongsTo(Dia::class, 'iddia', 'iddia');
    }
}
