<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Empresa extends Model
{
    protected $table = 'empresas';
    use HasFactory;
    public static function consultarEmpresasActivos()
    {
        $empresas = DB::select('SELECT * FROM empresas WHERE ind_estado = 1');
        return $empresas;
    }

    public static function consultarEmpresasReporte()
    {
        $empresas = DB::select('SELECT * FROM empresas');
        return $empresas;
    }
    public static function consultarDatosEmpresa($id_empresa){
        $empresa = DB::select('SELECT * FROM empresas WHERE id_empresa = ?', [$id_empresa]);
        return $empresa;
    }
  
}
