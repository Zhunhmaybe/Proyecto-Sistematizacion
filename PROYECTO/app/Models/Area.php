<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Departamento;

class Area extends Model
{
    use HasFactory;
    protected $table = 'areas';
    protected $primaryKey = 'idare';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idare',
        'iddep',
        'nombreare',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'iddep');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'idare');
    }
}
