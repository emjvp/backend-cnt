<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PJoven extends Model
{
    use HasFactory;
    protected $table = 'p_jovenes';
    protected $primaryKey = 'p_jovenes_id';
    public $timestamps = false;


      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'fumador',
        'annos_fumando',
    ];


    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
}
