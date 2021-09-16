<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Paciente;

class ConsultaController extends Controller
{
    //
    public function index()
    {
        return Consulta::all();
    }

    public function liberarConsultas()
    {
        Consulta::where('estado', 'Ocupada')
                ->orWhere('estado', 'En espera de atención al paciente')
                ->update(['estado' => 'Desocupada']);

        return Consulta::all();
    }

    public function liberarConsultasDeOcupadasALibres()
    {
        Consulta::where('estado', 'Ocupada')
                ->update(['estado' => 'Desocupada']);

        return Consulta::all();
    }

    public function asignacionDeConsulta($idPaciente)
    {
        $paciente = Paciente::find($idPaciente);
        $consulta = null;

        if($paciente->prioridad > 4){

            $consulta = Consulta::where('tipo_consulta', 'URGENCIAS')->get();

        }elseif ($paciente->edad <= 15) {

            $consulta = Consulta::where('tipo_consulta', 'PEDIATRIA')->get();

        }elseif ($paciente->edad >= 16 ){
            $consulta = Consulta::where('tipo_consulta', 'MEDICINA INTEGRAL MI')->get();
        }

        if($consulta->estado == 'Desocupada')
        {
            $consulta->estado = 'En espera de atención al paciente';
            $paciente->ubicacion = 'En consulta';
            $paciente->save();
        }

        $paciente->consulta_asignada = $consulta->tipo_consulta;

        $consulta->save();
    }

    public function atenderPaciente($idPaciente)
    {
        $paciente = Paciente::find($idPaciente) ;
        $tipoConsulta = '';
        if($paciente->prioridad > 4){

            $tipoConsulta = 'URGENCIAS';

        }elseif ($paciente->edad <= 15) {


            $tipoConsulta = 'PEDIATRIA';

        }elseif ($paciente->edad >= 16 ){
            $tipoConsulta = 'MEDICINA INTEGRAL MI';
        }
        $consulta = Consulta::where('tipo_consulta', $tipoConsulta)->get();

        // dd($consulta);
        $consulta->estado = 'Ocupada';
        $consulta->cant_pacientes++;
        $consulta->save;
    }

}
