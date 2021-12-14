<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\CotizacionMantenimiento;

class MantenimientosController extends Controller
{
    public function listarMantenimientos(){
        $mantenimientos = CotizacionMantenimiento::consultarMantenimientos();
       
        return view('mantenimientos',
        [
            'mantenimientos' => $mantenimientos,
        ]);
    }
}
