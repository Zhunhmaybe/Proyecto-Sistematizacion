<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Periodo;
use App\Models\Usuario;
use App\Models\Detallematricula;

class Matricula extends Model
{
    use HasFactory;
    protected $table = 'matriculas';
    protected $primaryKey = 'idmat';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'idmat',
        'idper',
        'idusu',
        'fechamat',
    ];
    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'idper');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idusu');
    }
    public function detallematriculas()
    {
        return $this->hasMany(Detallematricula::class, 'idmat');
    }
}
