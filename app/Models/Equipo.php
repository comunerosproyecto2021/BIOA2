<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Equipo extends Model
{

    protected $table = 'equipos';
    public $timestamps = false;

    use HasFactory;

    public static function consultarEquiposActivos()
    {
        $equipos = DB::select('SELECT * FROM equipos WHERE ind_activo = 1');
        return $equipos;
    }
    
}
