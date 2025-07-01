<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detallematricula;
use App\Models\Horario;

class Tutoria extends Model
{
    use HasFactory;
    protected $table = 'tutorias';
    protected $primaryKey = 'idtut';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idtut',
        'iddet',
        'idhor',
        'detalletut',
    ];

    public function detallematricula()
    {
        return $this->belongsTo(Detallematricula::class, 'iddet');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'idhor');
    }
}
