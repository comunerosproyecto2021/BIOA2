<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function mostrarFormulario()
    {   
     
        return view('registro');
    }

    public function registrar(Request $request)
    {   
        if ($request->ajax()) {
            try {

                $user = new User();
                $user->name = $request->input('nombres');
                $user->surname = $request->input('apellidos');
                $user->username = $request->input('nombre_usuario');
                $user->email = $request->input('correo');
                $user->password = Hash::make($request->input('contrasena'));
                $respuesta = $user->save();

                if ($respuesta) {
                    return response()->json(['success' => true, 'message' => 'Se ha registrado el usuario correctamente.', 'ruta' => url('/login')]);
                }
            } catch (\Illuminate\Database\QueryException $ex) {

                return response()->json(['success' => false, 'message' => $ex->getMessage()]);
            }
        }
    
    }

    public function cerrarSesion(Request $request){
        Auth::logout();
        return view('login');

    }
}

