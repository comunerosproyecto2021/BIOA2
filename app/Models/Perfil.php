<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Perfil extends Model
{

    protected $table = 'perfiles';
    public $timestamps = false;

    use HasFactory;
    public static function consultarPerfilesActivos()
    {
        $anios = DB::select('SELECT * FROM perfiles WHERE ind_activo = 1 ORDER BY orden');
        return $anios;
    }
    public static function consultarManoObra($perfil){
        $valores = DB::select('SELECT precio_hora FROM perfiles WHERE id_perfil = ?', [$perfil]);
        return $valores;
    }
    
    public static function consultarIngeniero(){
        $ingeniero = DB::select("SELECT * FROM perfiles WHERE perfil LIKE '%ingeniero%' ");
        return $ingeniero;
    }
}
