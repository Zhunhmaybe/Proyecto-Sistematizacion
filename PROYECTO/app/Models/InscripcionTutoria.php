<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Estudiante;
use App\Models\Tutoria;

class InscripcionTutoria extends Model
{
    protected $table = 'inscripcion_tutorias';
    protected $primaryKey = 'idinscripcion';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idinscripcion',
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
}
