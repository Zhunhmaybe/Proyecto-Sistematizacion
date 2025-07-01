<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Titulacion;
use App\Models\Nivel;

class Asignatura extends Model
{
    use HasFactory;
    protected $table = 'asignaturas';
    protected $primaryKey = 'idasi';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idasi',
        'idtit',
        'idniv',
        'nombreasi',
        'teoricosasi',
        'practicosasi',
    ];

    public function titulacion()
    {
        return $this->belongsTo(Titulacion::class, 'idtit');
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'idniv');
    }
}
