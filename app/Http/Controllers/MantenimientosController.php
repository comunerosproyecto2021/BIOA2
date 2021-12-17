<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \PDF;
use App\Models\CotizacionMantenimiento;
use App\Models\Anio;
use App\Models\Empresa;

class MantenimientosController extends Controller
{
    public function listarMantenimientos(){
        //$mantenimientos = CotizacionMantenimiento::consultarMantenimientos();
        $anios = Anio::consultarAniosActivos();
        $empresas = Empresa::consultarEmpresasActivos(); 
        
        return view('mantenimientos',
        [
            'anios' => $anios,
            'empresas' => $empresas,
        ]);
    }

    public function listarMantenimientosFiltro(Request $request){

        $mantenimientos = CotizacionMantenimiento::consultarMantenimientosFiltros($request);
        return response()->json(['success' => true, 'message' => $mantenimientos, 'ruta' => '']);

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

    
    public function VerPDF(){
        
    }

}
