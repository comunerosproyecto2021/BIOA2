@extends('layouts.app')
@section('content')
    @include('./nav_bar')
    <div class="container-table">
        <div class="row">
            <div class="col-12">
               
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            <th></th>
                            <th scope="col" width="15%">ID</th>
                            <th scope="col" width="15%">EQUIPO</th>
                            <th scope="col" width="15%">SERIAL</th>
                            <th scope="col" width="15%">TIPO MANTENIMIENTO</th>
                            <th scope="col" width="15%">ENCARGADO</th>
                            <th scope="col" width="15%">USUARIO</th>
                            <th scope="col" width="15%">FECHA CREA</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($mantenimientos as $value)
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox" value="" id="chk_{{$value->id_cotizacion}}"></td>
                                        <td scope="row"width="15%">{{$value->id_cotizacion}}</td>
                                        <td width="15%">{{$value->nombre_equipo}}</td>
                                        <td width="15%">{{$value->serial}}</td>
                                        <td width="15%">{{$value->tipo_mantenimiento}}</td>
                                        <td width="15%">{{$value->perfil}}</td>
                                        <td width="15%">{{$value->usuario}}</td>
                                        <td width="15%">{{$value->fecha_crea}}</td>
                                    </tr>
                                @endforeach                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="form-group col-md-6">
            <button type="button" class="btn btn-primary">Generar PDF</button>
        </div>
       
    </div>
@endsection