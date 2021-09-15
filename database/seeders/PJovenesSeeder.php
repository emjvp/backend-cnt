<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PJovenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // my table definitions go here
        DB::table('p_jovenes')->insert(
            [
                'fumador' => true,
                'annos_fumando' => 1
            ]
        );

        DB::table('p_jovenes')->insert(
            [
                'fumador' => true,
                'annos_fumando' => 2
            ]
        );

        DB::table('p_jovenes')->insert(
            [
                'fumador' => true,
                'annos_fumando' => 2
            ]
        );

        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
