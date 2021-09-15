<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PAnciano extends Model
{
    use HasFactory;
    protected $table = 'p_ancianos';
    protected $primaryKey = 'p_ancianos_id';
    public $timestamps = false;

    protected $fillable = [
        'tiene_dieta',
    ];



    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
}
