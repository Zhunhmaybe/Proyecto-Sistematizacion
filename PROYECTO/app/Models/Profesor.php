<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\ProAsi;
use App\Models\Asignatura;

class Profesor extends Model
{
    use HasFactory;
    protected $table = 'profesores';
    protected $primaryKey = 'idpro';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idpro',
        'idare',
        'nombrespro',
        'apellidopro',
        'correopro',
        'fechanacimientopro',
    ];
    //
    public function area()
    {
        return $this->belongsTo(Area::class, 'idare');
    }
    public function proasi()
    {
        return $this->hasMany(ProAsi::class, 'idpro','idpro');
    }
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'idasi', 'idasi');
    }
}
