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

}
