<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function mostrarFormulario()
    {   
        #$anios = Anio::consultarAniosActivos();
        #$tipos_mantenimientos = TipoMantenimiento::consultarTiposMantenimientosActivos();
        #$perfiles = Perfil::consultarPerfilesActivos();
      
        return view(
            'registro',
            [
                #'anios' => $anios,
                #'tipos_mantenimientos' => $tipos_mantenimientos,
                #'perfiles' => $perfiles
            ]
        );
    }

    public function registrar(Request $request)
    {   
        if ($request->ajax()) {
            try {
                /*$participante = new Participante();
                $participante->nombres = $request->input('nombres');
                $participante->apellidos = $request->input('apellidos');
                $participante->id_tipo_identificacion = $request->input('tipo_identificacion');
                $participante->numero_identificacion = $request->input('identificacion');
                $participante->correo = $request->input('correo');
                $participante->id_pais_residencia = $request->input('pais');
                $participante->ciudad_residencia = $request->input('ciudad_residencia');
                $participante->id_ocupacion = $request->input('ocupacion');
                $participante->nivel_residencia = $request->input('nivel_residencia');
                $participante->institucion = $request->input('institucion');
                $participante->id_farmaceutica = $request->input('farmaceuta');
                $participante->id_modo_entera_curso = $request->input('modo_publicidad');
                $participante->observaciones = $request->input('observaciones');
                $participante->fecha_registro = date("Y-m-d H:i:s");
                $respuesta = $participante->save();*/

                if (true) {
                    return response()->json(['success' => true, 'message' => $request->input('nombres'), 'ruta' => '']);
                }
            } catch (\Illuminate\Database\QueryException $ex) {

                return response()->json(['success' => false, 'message' => $ex->getMessage()]);
            }
        }
    
    }
}

