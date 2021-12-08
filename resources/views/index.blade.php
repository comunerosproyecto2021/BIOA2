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
    <div class="container">
        <form class="overflow-auto">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Usuario</label>
                    <select id="slt_perfiles" class="form-control">
                        <option selected value="">Seleccione...</option>
                        @foreach ($perfiles as $value)
                            <option value="{{ $value->id_perfil }}">{{ $value->perfil }}</option>
                         @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Tipo de mantenimiento</label>
                    <select id="slt_tipos_mantenimientos" class="form-control">
                        <option selected value="">Seleccione...</option>
                        @foreach ($tipos_mantenimientos as $value)
                            <option value="{{ $value->id_tipo }}">{{ $value->tipo_mantenimiento }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Año</label>
                    <select id="slt_anios" class="form-control">
                        <option selected value="">Seleccione...</option>
                        @foreach ($anios as $value)
                            <option value="{{ $value->anio }}">{{ $value->anio }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>IPC</label>
                    <input disabled type="text" class="form-control" id="txt_ipc" placeholder="IPC">
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
