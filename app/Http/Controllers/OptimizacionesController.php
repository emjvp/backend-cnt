<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Paciente;
use DB;


class OptimizacionesController extends Controller
{
    //
    public function optimizarAtencion()
    {
        return DB::select('select * from pacientes order by prioridad desc, edad asc, pacientes_id asc');
    }
}
