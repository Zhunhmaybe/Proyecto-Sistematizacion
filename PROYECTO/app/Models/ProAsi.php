<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asignatura;
use App\Models\Usuario;

class ProAsi extends Model
{
    use HasFactory;
    protected $table = 'pro_asi';
    protected $primaryKey = 'idpro';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idpro',
        'idasi',
        'idusu',
    ];

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'idasi');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idusu');
    }
}
