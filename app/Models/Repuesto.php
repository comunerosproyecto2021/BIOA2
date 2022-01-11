<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Repuesto extends Model
{
    use HasFactory;
    protected $table = 'repuestos';
    public $timestamps = false;

    public static function consultarRepuestosActivos()
    {
        $repuestos = DB::select('SELECT * FROM repuestos WHERE ind_activo = 1');
        return $repuestos;
    }

    public static function consultarRepuestoPorId($id_repuesto)
    {
        $repuestos = DB::select('SELECT * FROM repuestos WHERE id_repuesto = ?', [$id_repuesto]);
        return $repuestos;
    }
}
