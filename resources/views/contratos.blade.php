@extends('layouts.app')
@section('content')
@include('./nav_bar')
    <div class="container-form">
        
        <form>
            <h2 class="text-center">Formulario de contratos</h2>
            <input type="hidden" name="hdd_formulario_mantenimientos" id="hdd_formulario_mantenimientos" value="{{ url('/formulario_mantenimientos') }}">
       
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
                    <input type="number" class="form-control" id="txt_tiempo_contrato"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;"> 
                </div>
                <div class="form-group col-md-6">
                    <label>Unidad de tiempo</label>
                    <select id="slt_unidad_tiempo" class="form-control">
                        <option selected value="">Seleccione...</option>
                        <option value="dias">Dias</option>   
                        <option value="semanas">Semanas</option>   
                        <option value="meses">Meses</option>   
                        <option value="anios">Años</option>      
                    </select>
                </div>
            </div>
            <div id="div_contrato" style="display:none" class="form-row">
                <div class="form-group col-md-6">
                    <label>Costo estimado por equipo</label>
                    <input disabled type="text" class="form-control" id="txt_caculo_vlr">
                </div>
            </div>
        
            <div class="form-row">
                <div class="form-group col-md-6">
                    <button type="button" onclick="calcularCostoContrato()" class="btn btn-primary calcular">Costo estimado por equipo</button>
                </div>
                <div class="form-group col-md-6">
                    <button style="display:none;" type="button" onclick="mostrarFormularioMantenimientos()" class="btn btn-primary siguiente">Siguiente</button> 
                </div>
            
            </div>
        </form>
    </div>
@endsection