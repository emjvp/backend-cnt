<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHospitales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hospitales', function (Blueprint $table) {
            $table->foreign('consultas_id')->references('consultas_id')->on('consultas');
            $table->foreign('pacientes_id')->references('pacientes_id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hospitales', function (Blueprint $table) {
            $table->dropForeign('consulta_id');
            $table->dropForeign('paciente_id');
        });
    }
}
