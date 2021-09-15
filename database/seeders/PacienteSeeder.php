<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use App\Models\Paciente;
use App\Models\PJoven;

class PacienteSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $p_joven = PJoven::create(
            [
                'fumador' => true,
                'annos_fumando' => 1
            ]
        );

        // dd($p_joven->p_jovenes_id);

        DB::table('pacientes')->insert(
            [
                'nombre' => Str::random(10),
                'edad' => 18,
                'no_historia_clinica' => 7,
                'prioridad' => 3,
                'riesgo' => 89000,
                'ubicacion' => 'Sala de espera',
                'p_jovenes_id' => $p_joven->p_jovenes_id
            ]
        );

        $p_joven = PJoven::create(
            [
                'fumador' => true,
                'annos_fumando' => 4
            ]
        );


        DB::table('pacientes')->insert(
            [
                'nombre' => Str::random(10),
                'edad' => 16,
                'no_historia_clinica' => 6,
                'prioridad' => 8,
                'riesgo' => 89000,
                'ubicacion' => 'Sala de espera',
                'p_jovenes_id' => $p_joven->p_jovenes_id
            ]
        );

        $p_joven = PJoven::create(
            [
                'fumador' => true,
                'annos_fumando' => 14
            ]
        );

        DB::table('pacientes')->insert(
            [
                'nombre' => Str::random(10),
                'edad' => 40,
                'no_historia_clinica' => 5,
                'prioridad' => 1,
                'riesgo' => 89000,
                'ubicacion' => 'Sala de espera',
                'p_jovenes_id' => $p_joven->p_jovenes_id
            ]
        );
        // DB::table('pacientes')->insert(
        //     [
        //         'nombre' => Str::random(10),
        //         'edad' => 1,
        //         'no_historia_clinica' => 92,
        //         'prioridad' => 8,
        //         'riesgo' => 89000,
        //         'ubicacion' => 'Sala de espera',
        //     ]
        // );

        // DB::table('pacientes')->insert(
        //     [
        //         'nombre' => Str::random(10),
        //         'edad' => 2,
        //         'no_historia_clinica' => 100,
        //         'prioridad' => 3,
        //         'riesgo' => 89000,
        //         'ubicacion' => 'Sala de espera',
        //     ]
        // );

        // DB::table('pacientes')->insert(
        //     [
        //         'nombre' => Str::random(10),
        //         'edad' => 3,
        //         'no_historia_clinica' => 2,
        //         'prioridad' => 5,
        //         'riesgo' => 89000,
        //         'ubicacion' => 'Sala de espera',
        //     ]
        // );

        // DB::table('pacientes')->insert(
        //     [
        //         'nombre' => Str::random(10),
        //         'edad' => 41,
        //         'no_historia_clinica' => 1,
        //         'prioridad' => 8,
        //         'riesgo' => 89000,
        //         'ubicacion' => 'Sala de espera',
        //     ]
        // );

        // DB::table('pacientes')->insert(
        //     [
        //         'nombre' => Str::random(10),
        //         'edad' => 50,
        //         'no_historia_clinica' => 3,
        //         'prioridad' => 8,
        //         'riesgo' => 89000,
        //         'ubicacion' => 'Sala de espera',
        //     ]
        // );


        // DB::table('pacientes')->insert(
        //     [
        //         'nombre' => Str::random(10),
        //         'edad' => 18,
        //         'no_historia_clinica' => 89,
        //         'prioridad' => 10,
        //         'riesgo' => 89000,
        //     ]
        // );
        // DB::table('pacientes')->insert(
        //             [
        //                 'nombre' => Str::random(10),
        //                 'edad' => 60,
        //                 'no_historia_clinica' => 89,
        //                 'prioridad' => 10,
        //                 'riesgo' => 89000,
        //             ]
        //         );

        // for ($i=0; $i < 10; $i++) {
        //     $randomNumber = rand();
        //     DB::table('pacientes')->insert(
        //         [
        //             'nombre' => Str::random(10),
        //             'edad' => 10,
        //             'no_historia_clinica' => $i,
        //             'prioridad' => 10,
        //             'riesgo' => $randomNumber,
        //         ]
        //     );

        // }



    }
}
