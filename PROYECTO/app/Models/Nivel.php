<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asignatura;

class Nivel extends Model
{
    use HasFactory;
    protected $table = 'niveles';
    protected $primaryKey = 'idniv';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idniv',
        'nombreniv',
    ];

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class, 'idniv');
    }
}
