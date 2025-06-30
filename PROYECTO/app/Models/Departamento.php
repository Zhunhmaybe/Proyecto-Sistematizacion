<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $primaryKey = 'iddep'; // Porque no es "id"
    public $incrementing = false;    // Porque es char
    protected $keyType = 'string';   // Porque es tipo char

    protected $fillable = [
        'iddep',
        'nombredep',
    ];

    // Relación: Un departamento tiene muchas áreas
    public function areas()
    {
        return $this->hasMany(Area::class, 'iddep');
    }
}
