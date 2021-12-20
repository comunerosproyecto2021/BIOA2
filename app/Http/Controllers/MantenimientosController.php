<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
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

    public function descargarPDF(Request $request){
        $mantenimientos = CotizacionMantenimiento::consultarMantenimientosFiltros($request);
        //$pdf = PDF::loadView('pdf', [ 'mantenimientos' => $mantenimientos]);
        //$pdf->loadHTML('<h1>Test</h1>');
        //return $pdf->download('archivo.pdf');
        //return $pdf->stream();
        return view('pdf',
        [
            'mantenimientos' => $mantenimientos,
        ]);
    }
    public function verPDF(Request $request){
        $mantenimientos = CotizacionMantenimiento::consultarMantenimientos();
        $pdf = PDF::loadView('pdf', [ 'mantenimientos' => $mantenimientos]);
        $pdf ->render();
        $nombre="Reporte_PDF";
        //return $pdf->stream();
        $pdf=$pdf->output();
        @file_put_contents(UPLOAD_DIR.$nombre.".pdf", $pdf);
        //echo json_encode("http://regorodri.noip.me/proyecto/librerias/php/".UPLOAD_DIR.$nombre.".pdf");
    }

 

}
