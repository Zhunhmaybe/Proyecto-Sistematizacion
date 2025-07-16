<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dia;
use App\Models\Tutoria;

class Horario extends Model
{
    use HasFactory;
    protected $table = 'horarios';
    protected $primaryKey = 'idhor';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idhor',
        'horaini',
        'horafin',
        'iddia',
    ];
    
    public function tutoria(){
        return $this->hasMany(tutoria::class,'idhor');
    }

    public function dia()
    {
        return $this->belongsTo(Dia::class, 'iddia');
    }
}
