<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anio;
use App\Models\TipoMantenimiento;
use App\Models\Perfil;
class InicioController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

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

}
