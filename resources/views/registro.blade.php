@extends('layouts.app')
@section('content')
    <div class="container">
        <form>
            <h2 class="text-center">Formulario registro de usuarios</h2>
            <input type="hidden" name="hdd_ruta_registrar_usuario" id="hdd_ruta_registrar_usuario" value="{{ url('/registro') }}">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombres</label>
                    <input type="text" class="form-control" id="txt_nombres">
                </div>
                <div class="form-group col-md-6">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" id="txt_apellidos">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre de usuario</label>
                    <input type="text" class="form-control" id="txt_nombre_usuario">
                </div>
                <div class="form-group col-md-6">
                    <label>Correo</label>
                    <input type="text" class="form-control" id="txt_correo">
                </div>
            </div>
            <div class="form-row">
               
                <div class="form-group col-md-6">
                    <label>Contraseña</i></label>
                    <input type="password"  class="form-control" id="txt_contrasena">
                </div>
            </div>
            
            <div class="form-group col-md-12">
                <button type="button" onclick="registrarUsuario()" class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>
@endsection