<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIOA2</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/funcionalidad.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert2@11.js') }}" defer></script>
    <script src="{{ asset('js/ajax.js') }}" defer></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
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
    <div class="container">
        <form>
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
    <footer class="flex-shrink-0 py-4 bg-dark text-white-50">
        <div class="text-center">
            <small>Copyright &copy; Todos los derechos reservados.</small>
        </div>
    </footer>
</body>

</html>
