<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TipoMantenimiento extends Model
{
    use HasFactory;
    protected $table = 'tipos_mantenimientos';
    public $timestamps = false;

    use HasFactory;
    public static function consultarTiposMantenimientosActivos()
    {
        $tipos_mantenimientos = DB::select('SELECT * FROM tipos_mantenimientos WHERE ind_activo = 1  ORDER BY orden');
        return $tipos_mantenimientos;
    }
}
