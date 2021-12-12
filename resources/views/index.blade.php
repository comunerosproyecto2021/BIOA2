@extends('layouts.app')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Sistema BIOA2</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link">Cerrar sesión</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="container-form">
        
        <form>
            <h2 class="text-center">Formulario de cálculo de mantenimientos</h2>
            <input type="hidden" name="hdd_ruta_consultar_ipc" id="hdd_ruta_consultar_ipc" value="{{ url('/ipc') }}">
            <input type="hidden" name="hdd_ruta_consultar_mano_obra" id="hdd_ruta_consultar_mano_obra" value="{{ url('/vlr_hora') }}">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Encargado del mantenimiento</label>
                    <select onchange="consultarValorManoObra()" id="slt_perfiles" class="form-control">
                        <option selected value="">Seleccione...</option>
                        @foreach ($perfiles as $value)
                            <option value="{{ $value->id_perfil }}">{{ $value->perfil }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Valor mano de obra por hora</label>
                    <input disabled type="number" class="form-control" id="txt_valor_mano_obra">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Tipo de mantenimiento</label>
                    <select onchange="seleccionarTipoMantenimiento()" id="slt_tipos_mantenimientos"
                        class="form-control">
                        <option selected value="">Seleccione...</option>
                        @foreach ($tipos_mantenimientos as $value)
                            <option value="{{ $value->id_tipo }}">{{ $value->tipo_mantenimiento }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Tiempo de mantenimiento <i>(horas)</i></label>
                    <input disabled type="number" class="form-control" id="txt_tiempo_mantenimiento">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Año</label>
                    <select onchange="consultarIPC()" id="slt_anios" class="form-control">
                        <option selected value="">Seleccione...</option>
                        @foreach ($anios as $value)
                            <option value="{{ $value->anio }}">{{ $value->anio }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>IPC</label>
                    <input disabled type="text" class="form-control" id="txt_ipc">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre del equipo</label>
                    <input type="text" class="form-control" id="txt_equipo">
                </div>
                <div class="form-group col-md-6">
                    <label>Serial</label>
                    <input type="text" class="form-control" id="txt_serial">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Valor herramientas <i>(Pesos colombianos, sin comas ni puntos)</i></label>
                    <input type="number" class="form-control" id="txt_valor_herramientas">
                </div>
                <div class="form-group col-md-6">
                    <label>Valor consumibles  <i>(Pesos colombianos, sin comas ni puntos)</i></label>
                    <input type="number" class="form-control" id="txt_valor_consumibles">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Valor repuestos <i>(Pesos colombianos, sin comas ni puntos)</i></label>
                    <input type="number" class="form-control" id="txt_valor_repuestos">
                </div>
            </div>
            <div  class="form-row">
                <div class="form-group col-md-6">
                    <label>Descripción repuestos</i></label>
                    <textarea rows="3" class="form-control" id="txt_descripcion_repuestos" placeholder="..."></textarea>
                </div>
            </div>
            <div class="form-group col-md-12">
                <button type="button" onclick="guardarInformacion()" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection