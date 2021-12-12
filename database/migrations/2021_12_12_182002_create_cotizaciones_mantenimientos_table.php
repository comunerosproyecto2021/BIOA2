<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionesMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones_mantenimientos', function (Blueprint $table) {
            $table->bigIncrements('id_cotizacion');
            $table->bigInteger('id_encargado')->unsigned()->index();
            $table->bigInteger('id_tipo_mantenimiento')->unsigned()->index();
            $table->string('anio_cotizacion')->nullable(false);
            $table->string('nombre_equipo')->nullable(false);
            $table->string('serial')->nullable(false);
            $table->integer('valor_herramienta')->nullable(false);
            $table->integer('valor_consumibles')->nullable(false);
            $table->integer('valor_repuestos')->nullable(false);
            $table->integer('valor_total')->nullable(false);
            $table->text('descripcion_repuestos')->nullable();
            $table->bigInteger('id_usuario_crea')->unsigned()->index();
            $table->dateTime('fecha_crea')->default(NOW())->nullable(false);
            $table->dateTime('fecha_modificacion')->nullable();
           
            $table->foreign('id_encargado')
            ->references('id_perfil')
            ->on('perfiles')
            ->onDelete('cascade');

            $table->foreign('id_tipo_mantenimiento')
            ->references('id_tipo')
            ->on('tipos_mantenimientos')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizaciones_mantenimientos');
    }
}
