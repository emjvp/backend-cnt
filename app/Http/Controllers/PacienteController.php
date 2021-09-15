<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Paciente;

use DB;

use App\Models\PAnciano;
use App\Models\PJoven;
use App\Models\PNinno;

class PacienteController extends Controller
{

    public function index()
    {
        return Paciente::all();
    }

    public function consultarPacientesDeformaOptima()
    {
        $optimizacionesController = new OptimizacionesController();
        return $optimizacionesController->optimizarAtencion();
    }

    //Lista los pacientes con mayor riesgo que el de la historia clínica dada
    public function listarPacientesMayorRiesgo($historiaClinica)
    {
        $riesgo = Paciente::firstWhere('no_historia_clinica', $historiaClinica)->riesgo;

        $pacientesConMayorRiesgo = Paciente::where('riesgo', '>', $riesgo)->get();

        return $pacientesConMayorRiesgo;
    }

    public function registrarPaciente(Request $request)
    {
        $edad = $request->input('edad');

        $prioridad = 0;
        $relacionPesoEstatura = $request->input('relacion_peso_estatura');
        $tieneDieta = $request->input('tiene_dieta');
        $ubicacion  = $request->input('ubicacion');
        $nombre = $request->input('nombre');
        $edad = $request->input('edad');
        $no_historia_clinica = $request->input('no_historia_clinica');

        $pninno_id = null;
        $pjoven_id = null;
        $panciano_id = null;

        switch ($edad) {

            //niños
            case $edad <= 5:

                $pninno = PNinno::create([
                    'relacion_peso_estatura' => $relacionPesoEstatura
                ]);

                $pninno_id = $pninno->p_ninnos_id;
                $prioridad = $relacionPesoEstatura + 3;


                break;

            case $edad >= 6 && $edad <= 12:

                $pninno = PNinno::create([
                    'relacion_peso_estatura' => $relacionPesoEstatura
                ]);

                $pninno_id = $pninno->p_ninnos_id;
                $prioridad = $relacionPesoEstatura + 2;

                break;

            case $edad >= 13 && $edad <= 15:

                $pninno = PNinno::create([
                    'relacion_peso_estatura' => $relacionPesoEstatura
                ]);

                $pninno_id = $pninno->p_ninnos_id;
                $prioridad = $relacionPesoEstatura + 2;

                break;

            //jóvenes
            case $edad >= 16 && $edad <= 40:

                $esFumador = $request->input('fumador');
                $annosFumando = $request->input('annos_fumando');

                PJoven::create([
                    'fumador' => $esFumador ? $esFumador : false,
                    'annos_fumando' => $annosFumando
                ]);


                if($esFumador){
                    $prioridad = $annosFumando/4 + 2;
                }else{
                    $prioridad = 2;
                }

            case $edad > 40:

                PAnciano::create([
                    'tiene_dieta' => $tieneDieta ? $tieneDieta : false
                ]);

                if($tieneDieta && $edad >= 60 && $edad <= 100)
                {
                    $prioridad = $edad/20 + 4;
                }
                else {
                    $prioridad = $edad/30 + 3;
                }

                break;

        }

        $riesgo = $edad <= 40 ? ($edad * $prioridad)/100 : ($edad * $prioridad)/100 + 5.3;


        $data = [
            'nombre' => $nombre,
            'edad' => $edad,
            'no_historia_clinica' => $no_historia_clinica,
            'prioridad' => $prioridad,
            'riesgo' => $riesgo,
            'ubicacion' => $ubicacion,
            'p_ninnos_id' => $pninno_id,
            'p_ancianos_id' => $panciano_id,
            'p_jovenes_id' => $pjoven_id,
        ];

        $paciente = Paciente::create($data);

        return $paciente;
    }


    public function pacienteMasAnciano()
    {
        return DB::select("select * from pacientes where edad = (
            select max(edad) from pacientes
        )");
    }

    public function consultarMasPacientesAtendidos()
    {
        return DB::select("select * from consultas where cant_pacientes = (
            select max(cant_pacientes) from consultas
        )");
    }

    public function listarPacientesFumadoresUrg()
    {
        return DB::select('select * from pacientes, p_jovenes
        where p_jovenes.fumador = 1 and pacientes.p_jovenes_id = p_jovenes.p_jovenes_id
        order by pacientes.prioridad desc');    }

}
