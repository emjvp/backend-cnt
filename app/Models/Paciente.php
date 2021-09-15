<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $table = 'pacientes';
    public $timestamps = false;

    protected $primaryKey = 'pacientes_id';
      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nombre',
        'edad',
        'no_historia_clinica',
        'prioridad',
        'riesgo',
        'ubicacion',
        'consulta_asignada',
        'p_ninnos_id',
        'p_ancianos_id',
        'p_jovenes_id'
    ];


    public function prioridadDeAncianos()
    {
        return $this->hasOne(PAnciano::class, 'p_ancianos_id');
    }

    public function prioridadDeJovenes()
    {
        return $this->hasOne(PJoven::class, 'p_jovenes_id');
    }

    public function prioridadDeNinnos()
    {
        return $this->hasOne(PNinno::class, 'p_ninnos_id');
    }

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
}
