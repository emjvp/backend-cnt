<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $table = 'consultas';
    public $timestamps = false;
    protected $primaryKey = 'consultas_id';

    protected $fillable = [
        'cant_pacientes',
        'nombre_especialista',
        'tipo_consulta',
        'estado'
    ];

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';

}
