<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anio;
use App\Models\TipoMantenimiento;
use App\Models\Perfil;
use App\Models\CotizacionMantenimiento;

class InicioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mostrarFormulario()
    {   
        $anios = Anio::consultarAniosActivos();
        $tipos_mantenimientos = TipoMantenimiento::consultarTiposMantenimientosActivos();
        $perfiles = Perfil::consultarPerfilesActivos();
      
        return view(
            'index',
            [
                'anios' => $anios,
                'tipos_mantenimientos' => $tipos_mantenimientos,
                'perfiles' => $perfiles
            ]
        );
    }

    public function consultarIPC(Request $request){

        if ($request->ajax()) {
            try {
                $respuesta = Anio::consultarIPC($request->input('anio'));
                return response()->json(['success' => true, 'message' => $respuesta]);
                
            } catch (\Illuminate\Database\QueryException $ex) {

                return response()->json(['success' => false, 'message' => $ex->getMessage()]);
            }
        }
    }

    public function consultarValorManoObra(Request $request){

        if ($request->ajax()) {
            try {
                $respuesta = Perfil::consultarManoObra($request->input('perfil'));
                return response()->json(['success' => true, 'message' => $respuesta]);
                
            } catch (\Illuminate\Database\QueryException $ex) {

                return response()->json(['success' => false, 'message' => $ex->getMessage()]);
            }
        }
    }
    
    public function guardarDatos(Request $request){

        if ($request->ajax()) {
            try {
                $cotizacion = new CotizacionMantenimiento();
                $cotizacion->id_encargado=$request->input('encargado');
                $cotizacion->id_tipo_mantenimiento=$request->input('tipo_mant'); 
                $cotizacion->anio_cotizacion =$request->input('anio');
                $cotizacion->nombre_equipo =$request->input('nombre_equipo');
                $cotizacion->serial=$request->input('serial');
                $cotizacion->valor_herramienta=$request->input('valor_herramientas');
                $cotizacion->valor_consumibles=$request->input('valor_consumibles');
                $cotizacion->valor_repuestos=$request->input('valor_repuestos');
                $cotizacion->valor_total=$request->input('valor_total');
                $cotizacion->tiempo_mantenimiento=$request->input('tiempo_mantenimiento');
                $cotizacion->descripcion_repuestos=$request->input('descripcion_repuestos');
                $cotizacion->id_usuario_crea=$request->input('id_usuario');
                $cotizacion->fecha_crea= date("Y-m-d H:i:s");
                $respuesta = $cotizacion->save();
                if($respuesta){
                    return response()->json(['success' => true, 'message' => 'Lo datos se han guardado correctamente', 'ruta' => url('/')]);
                }
            } catch (\Illuminate\Database\QueryException $ex) {

                return response()->json(['success' => false, 'message' => $ex->getMessage()]);
            }
        }
    } 
}
