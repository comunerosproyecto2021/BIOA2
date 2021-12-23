@extends('layouts.app')
@section('content')
    @include('./nav_bar')
    <div class="container-table">
        <div class="row">
            <div class="col-12">
                <div class="row container-filtros">
                    <h5>Filtros</h5>
                    <input type="hidden" id="hdd_route_consultar_mantenimientos" value="{{url('/mantenimientos_filtro')}}">
                    <input type="hidden" id="hdd_route_descargar_pdf" value="{{url('/descargar_pdf')}}">
                    <div class="form-group"> 
                        <?php $aux = 1; ?>
                        @foreach($empresas as $value)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chk_empresa_{{$aux}}" value="{{$value->id_empresa}}">
                                <label class="form-check-label">{{$value->nombre}}</label>
                            </div>
                            <?php $aux++; ?>
                        @endforeach
                        <input type="hidden" id="hdd_cantidad_empresas" value="{{$aux}}">
                    </div>
                    <div class="form-group">
                        <?php $aux_2 = 1; ?>
                        @foreach($anios as $value)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chk_anio_{{$aux_2}}" value="{{$value->anio}}">
                                <label class="form-check-label">{{$value->anio}}</label>
                            </div>
                            <?php $aux_2++; ?>
                        @endforeach
                        <input type="hidden" id="hdd_cantidad_anios" value="{{$aux_2}}">

                    </div>
                    <div class="form-group">
                        <div class="col-4">
                            <label>Nombre del equipo</label>
                            <select id="slt_equipo" class="form-control">
                                <option selected value="">Seleccione...</option>
                                @foreach ($equipos as $value)
                                    <option value="{{ $value->nombre }}">{{ $value->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <span id="spn_mensaje_error"></span>
                    </div>
                    <div class="form-group">
                        <div class="col-4">
                            <button type="button" onclick="consultarMantenimientos();" class="btn btn-primary">Consultar</button>
                        </div>
                    </div>
                </div>

                <div id="table_mantenimientos_container" class="table-responsive">
                   
                </div>
                    
            </div>
        </div>
       
       
    </div>
@endsection