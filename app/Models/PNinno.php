<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PNinno extends Model
{
    use HasFactory;
    protected $table = 'p_ninnos';
    protected $primaryKey = 'p_ninnos_id';
    public $timestamps = false;

      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'relacion_peso_estatura',
    ];

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
}
