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
                            <th scope="col">ID</th>
                            <th scope="col">EQUIPO</th>
                            <th scope="col">SERIAL</th>
                            <th scope="col">TIPO MANTENIMIENTO</th>
                            <th scope="col">ENCARGADO</th>
                            <th scope="col">USUARIO</th>
                            <th scope="col">FECHA CREA</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($mantenimientos as $value)
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox" value="" id="chk_{{$value->id_cotizacion}}"></td>
                                        <th scope="row">{{$value->id_cotizacion}}</th>
                                        <td>{{$value->nombre_equipo}}</td>
                                        <td>{{$value->serial}}</td>
                                        <td>{{$value->tipo_mantenimiento}}</td>
                                        <td>{{$value->perfil}}</td>
                                        <td>{{$value->usuario}}</td>
                                        <td>{{$value->fecha_crea}}</td>
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