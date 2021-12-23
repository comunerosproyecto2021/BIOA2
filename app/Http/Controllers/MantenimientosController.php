<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use App\Models\CotizacionMantenimiento;
use App\Models\Anio;
use App\Models\Empresa;
use App\Models\Equipo;

class MantenimientosController extends Controller
{
    public function listarMantenimientos(){
       
        $anios = Anio::consultarAniosActivos();
        $empresas = Empresa::consultarEmpresasActivos(); 
        $equipos = Equipo::consultarEquiposActivos();
        
        return view('mantenimientos',
        [
            'anios' => $anios,
            'empresas' => $empresas,
            'equipos' => $equipos,
        ]);
    }

    public function listarMantenimientosFiltro(Request $request){

        $mantenimientos = CotizacionMantenimiento::consultarMantenimientosFiltros($request);
        return response()->json(['success' => true, 'message' => $mantenimientos, 'ruta' => '']);

    }

    public function descargarPDF(Request $request){
        $mantenimientos = CotizacionMantenimiento::consultarMantenimientosFiltros($request);
        $pdf = PDF::loadView('pdf', [ 'mantenimientos' => $mantenimientos]);
        $path = public_path('pdf/');    
        $fileName =  'reporte_cotizaciones'.'.'. 'pdf' ; 
        $pdf->save($path . '/' . $fileName); 
        $pdf = public_path('pdf/'.$fileName); 

        return response()->download($pdf); 
    }

}
