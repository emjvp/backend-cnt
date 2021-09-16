<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {

            $table->id('pacientes_id');
            $table->string('nombre');
            $table->integer('edad');


            $table->integer('no_historia_clinica')->unique();
            $table->integer('prioridad');
            $table->integer('riesgo');
            $table->string('ubicacion');
            $table->string('consulta_asignada')->default('NO ASIGNADA');
            $table->unsignedBigInteger('p_ninnos_id')->nullable();
            $table->unsignedBigInteger('p_ancianos_id')->nullable();
            $table->unsignedBigInteger('p_jovenes_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
