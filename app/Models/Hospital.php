<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $table = 'hospitales';
    public $timestamps = false;


    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
}
