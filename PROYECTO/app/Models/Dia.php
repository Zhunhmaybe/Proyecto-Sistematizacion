<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;
    protected $table = 'dias';
    protected $primaryKey = 'iddia';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'iddia',
        'nombredia',
    ];

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'iddia');
    }
}
