<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matricula;

class Estudiante extends Model
{
    use HasFactory;
    protected $table = 'estudiantes';
    protected $primaryKey = 'idest';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idest',
        'nombreest',
        'apellidoest',
        'mailest',
        'nacimientoest',
    ];

    public function estudiante(){
        return $this->hasMany(Matricula::class,'idest');
    }
}
