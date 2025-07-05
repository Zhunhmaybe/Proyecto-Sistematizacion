<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matricula;

class Periodo extends Model
{
    use HasFactory;
    protected $table = 'periodos';
    protected $primaryKey = 'idper';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idper',
        'detalleper',
        'inicioper',
        'finper',
    ];
    public function matricula(){
        return $this->hasMany(Matricula::class,'idper');
    }
}
