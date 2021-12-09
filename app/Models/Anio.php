<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Anio extends Model
{   
    protected $table = 'anios';
    public $timestamps = false;

    use HasFactory;
    public static function consultarAniosActivos()
    {
        $anios = DB::select('SELECT * FROM anios WHERE ind_activo = 1  ORDER BY orden');
        return $anios;
    }

    public static function consultarIPC($anio){
    
        $ipc = DB::select('SELECT ipc FROM anios WHERE anio = ? ', [$anio]);
        return $ipc;
    }
}
