<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asignatura;

class Titulacion extends Model
{
    use HasFactory;
    protected $table = 'titulaciones';
    protected $primaryKey = 'idtit';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idtit',
        'detalletit',
        'nivelestit',
    ];

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class, 'idtit');
    }
}
