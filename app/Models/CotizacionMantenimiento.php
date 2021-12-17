<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CotizacionMantenimiento extends Model
{ 
    protected $table = 'cotizaciones_mantenimientos';
    public $timestamps = false;
    use HasFactory;
    protected $guarded = [];

    public static function consultarMantenimientos()
    {
        $mantenimientos = DB::select("SELECT C.*, P.perfil, T.tipo_mantenimiento, CONCAT(U.name, ' ', U.surname) AS usuario,
        E.nombre AS empresa, E.logo
        FROM cotizaciones_mantenimientos C
        INNER JOIN perfiles P ON P.id_perfil = C.id_encargado
        INNER JOIN tipos_mantenimientos T ON T.id_tipo = C.id_tipo_mantenimiento
        INNER JOIN users U ON U.id = C.id_usuario_crea
        INNER JOIN empresas E ON E.id_empresa = C.id_empresa
        ORDER BY fecha_crea;");
        return $mantenimientos;
    }
    public static function consultarMantenimientosFiltros($request)
    {
        $empresa_1 = $request->input('empresa_1');
        $empresa_2 = $request->input('empresa_2');

        $anio_1 = $request->input('anio_1');
        $anio_2 = $request->input('anio_2');
        $anio_3 = $request->input('anio_3');
        $anio_4 = $request->input('anio_4');
        
        $empresa_1 == "" ? "NULL" :  $empresa_1;
        $empresa_2 == "" ? "NULL" :  $empresa_2;

        $anio_1 == "" ? "NULL" :  $anio_1;
        $anio_2 == "" ? "NULL" :  $anio_2;
        $anio_3 == "" ? "NULL" :  $anio_3;
        $anio_4 == "" ? "NULL" :  $anio_4;
       
        $sql_empresas="( C.id_empresa='$empresa_1' OR C.id_empresa='$empresa_2' )";
        $sql_anios="( anio_cotizacion='$anio_1' OR anio_cotizacion='$anio_2' OR anio_cotizacion='$anio_3' OR anio_cotizacion='$anio_4' )";

        $mantenimientos = DB::select("SELECT C.*, P.perfil, T.tipo_mantenimiento, CONCAT(U.name, ' ', U.surname) AS usuario,
        E.nombre AS empresa, E.logo
        FROM cotizaciones_mantenimientos C
        INNER JOIN perfiles P ON P.id_perfil = C.id_encargado
        INNER JOIN tipos_mantenimientos T ON T.id_tipo = C.id_tipo_mantenimiento
        INNER JOIN users U ON U.id = C.id_usuario_crea
        INNER JOIN empresas E ON E.id_empresa = C.id_empresa
        WHERE C.id_cotizacion IS NOT NULL AND $sql_empresas AND $sql_anios
        ORDER BY C.fecha_crea;");

        return $mantenimientos;
    }

}
