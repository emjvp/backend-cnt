<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ConsultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('consultas')->insert(
            [
                'cant_pacientes' => 0,
                'nombre_especialista' => "Miguel Contreras",
                'tipo_consulta' => "PEDIATRIA",
                'estado' => "Ocupada"
            ]
        );

        DB::table('consultas')->insert(
            [
                'cant_pacientes' => 0,
                'nombre_especialista' => "Adriana Manotas",
                'tipo_consulta' => "URGENCIAS",
                'estado' => "Ocupada"
            ]
        );

        DB::table('consultas')->insert(
            [
                'cant_pacientes' => 0,
                'nombre_especialista' => "Felipe Arias",
                'tipo_consulta' => "MEDICINA INTEGRAL MI",
                'estado' => "Ocupada"
            ]
        );
    }
}



