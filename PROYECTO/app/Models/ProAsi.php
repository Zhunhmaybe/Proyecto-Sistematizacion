<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asignatura;
use App\Models\User;

class ProAsi extends Model
{
    use HasFactory;

    protected $table = 'pro_asi';
    protected $primaryKey = 'idpro_asi';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idpro_asi',
        'idasi',
        'idpro',
    ];

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'idpro');
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'idasi');
    }
}
