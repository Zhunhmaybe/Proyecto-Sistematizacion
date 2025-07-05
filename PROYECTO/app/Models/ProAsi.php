<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asignatura;
use App\Models\Profesor;

class ProAsi extends Model
{
    use HasFactory;
    protected $table = 'pro_asi';
    protected $primaryKey = 'idpro';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idpro_asi',
        'idasi',
        'idpro',
    ];

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'idasi');
    }

    public function usuario()
    {
        return $this->belongsTo(Profesor::class, 'idpro');
    }
}
