<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_mantenimientos', function (Blueprint $table) {
            $table->bigIncrements('id_tipo');
            $table->string('tipo_mantenimiento')->nullable();
            $table->integer('orden')->nullable();
            $table->integer('ind_activo')->length(1)->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_mantenimientos');
    }
}
