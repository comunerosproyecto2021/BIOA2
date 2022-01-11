@extends('layouts.app')
@section('content')
@include('./nav_bar')
    <div class="container-form">
        
        <form>
            <h2 class="text-center">Formulario de contratos</h2>
            <input type="hidden" name="hdd_ruta_consultar_ipc" id="hdd_ruta_consultar_ipc" value="{{ url('/ipc') }}">
            <input type="hidden" name="hdd_guardar_datos" id="hdd_guardar_datos" value="{{ url('/guardar_datos') }}">
            <input type="hidden" name="hdd_id_usuario" id="hdd_id_usuario" value="{{session('id_usuario')}}">
            <input type="hidden" name="hdd_id_empresa" id="hdd_id_empresa" value="{{session('id_empresa')}}">
       
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Valor del contrato<i>*</i></label>
                    <input type="number" class="form-control" id="txt_valor_contrato"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
                   
                </div>
                <div class="form-group col-md-6">
                    <label>Valor mano de obra<i>*</i></label>
                    <input type="number" class="form-control" id="txt_valor_mano_obra"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Cantidad de equipos<i>*</i></label>
                    <input type="number" class="form-control" id="txt_qty_equipos"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
                </div>
                <div class="form-group col-md-6">
                    <label>Valor accesorios y repuestos</label>
                    <input type="number" class="form-control" id="txt_vlr_accesorios"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Tiempo de Contrato</label>
                    <input type="number" class="form-control" id="txt_qty_equipos"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
                </div>
            </div>
            <div id="div_contrato" style="display:none" class="form-row">
                <div class="form-group col-md-6">
                    
                    <input disabled type="text" class="form-control" id="txt_caculo_vlr">
                </div>
            </div>
        
            <div class="form-group col-md-12">
                <button type="button" onclick="calcularCostoContrato()" class="btn btn-primary calcular">Costo estimado por equipo</button>
                <!--button type="button" onclick="guardarInformacion()" class="btn btn-primary guardar">Guardar</button> -->
            </div>
        </form>
    </div>
@endsection