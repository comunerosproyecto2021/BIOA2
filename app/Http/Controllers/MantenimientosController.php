<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \PDF;
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

    public function reportePdf(){
      
        return view('pdf',
        [
      
        ]);
    }

    public function generarReporte(){
      
        //$pdf = PDF::loadView('pdf');
        //return $pdf->download("Reporte.pdf");
    }

    
}
