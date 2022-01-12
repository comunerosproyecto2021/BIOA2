<form>
    <h2 class="text-center">Formulario de cotización de mantenimientos</h2>
    <input type="hidden" name="hdd_ruta_consultar_ipc" id="hdd_ruta_consultar_ipc" value="{{ url('/ipc') }}">
    <input type="hidden" name="hdd_ruta_consultar_mano_obra" id="hdd_ruta_consultar_mano_obra"
        value="{{ url('/vlr_hora') }}">
    <input type="hidden" name="hdd_guardar_datos" id="hdd_guardar_datos" value="{{ url('/guardar_datos') }}">
    <input type="hidden" name="hdd_ruta_consultar_repuesto" id="hdd_ruta_consultar_repuesto" value="{{ url('/consultar_repuesto') }}">
    
    <input type="hidden" name="hdd_id_usuario" id="hdd_id_usuario" value="{{ session('id_usuario') }}">
    <input type="hidden" name="hdd_id_empresa" id="hdd_id_empresa" value="{{ session('id_empresa') }}">
    <input type="hidden" name="hdd_ipc_2016" id="hdd_ipc_2016" value="{{ $ipc_2016[0]->ipc }}">
    <input type="hidden" name="hdd_ipc_2017" id="hdd_ipc_2017" value="{{ $ipc_2017[0]->ipc }}">
    <input type="hidden" name="hdd_ipc_2018" id="hdd_ipc_2018" value="{{ $ipc_2018[0]->ipc }}">
    <input type="hidden" name="hdd_ipc_2019" id="hdd_ipc_2019" value="{{ $ipc_2019[0]->ipc }}">
    <input type="hidden" name="hdd_ipc_2020" id="hdd_ipc_2020" value="{{ $ipc_2020[0]->ipc }}">
    

    <input type="hidden" name="hdd_valor_contrato" id="hdd_valor_contrato" value="{{ $valor_contrato }}">
    <input type="hidden" name="hdd_vlr_obra" id="hdd_vlr_obra" value="{{ $vlr_obra }}">
    <input type="hidden" name="hdd_qty_equipos" id="hdd_qty_equipos" value="{{ $qty_equipos }}">
    <input type="hidden" name="hdd_vlr_accesorios" id="hdd_vlr_accesorios" value="{{ $vlr_accesorios }}">
    <input type="hidden" name="hdd_tiempo_contrato" id="hdd_tiempo_contrato" value="{{ $tiempo_contrato }}">
    <input type="hidden" name="hdd_unidad_tiempo" id="hdd_unidad_tiempo" value="{{ $unidad_tiempo }}">
    <input type="hidden" name="hdd_calculo_vlr" id="hdd_calculo_vlr" value="{{ $calculo_vlr }}">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Encargado del mantenimiento</label>

            <select onchange="calcularValores()" id="slt_perfiles" class="form-control">
                <option selected value="">Seleccione...</option>
                <?php if(session('id_empresa')=="1"){ ?>
                @foreach ($perfiles as $value)
                    <option value="{{ $value->id_perfil }}">{{ $value->perfil }}</option>
                @endforeach
                <?php }else{ ?>
                <option value="{{ $ingeniero[0]->id_perfil }} ">{{ $ingeniero[0]->perfil }}</option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Valor mano de obra por hora</label>
            <input disabled type="number" class="form-control" id="txt_valor_mano_obra" min="0" pattern="^[0-9]+"
                onpaste="return false;" onDrop="return false;">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Tipo de mantenimiento</label>
            <select onchange="seleccionarTipoMantenimiento()" id="slt_tipos_mantenimientos" class="form-control">
                <option selected value="">Seleccione...</option>
                @foreach ($tipos_mantenimientos as $value)
                    <option value="{{ $value->id_tipo }}">{{ $value->tipo_mantenimiento }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Tiempo de mantenimiento<i>(horas)</i></label>
            <input disabled type="number" class="form-control" id="txt_tiempo_mantenimiento" min="0" pattern="^[0-9]+"
                onpaste="return false;" onDrop="return false;">
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
        <!--<div class="form-group col-md-6">
            <label>Valor mano de obra con IPC</label>
            <input disabled type="text" class="form-control" id="txt_valor_mano_ipc">
        </div>-->
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">

            <label>Equipo</label>
            <select id="txt_equipo" class="form-control">
                <option selected value="">Seleccione...</option>
                @foreach ($equipos as $value)
                    <option value="{{ $value->nombre }}">{{ $value->nombre }}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group col-md-6">
            <label>Serial / modelo</label>
            <input type="text" class="form-control" id="txt_serial">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Valor herramientas <i>(Pesos colombianos, sin comas ni puntos)</i></label>
            <input disabled type="number" class="form-control" id="txt_valor_herramientas" min="0" pattern="^[0-9]+"
                onpaste="return false;" onDrop="return false;">
        </div>
        <div class="form-group col-md-6">
            <label>Valor consumibles <i>(Pesos colombianos, sin comas ni puntos)</i></label>
            <input disabled type="number" class="form-control" id="txt_valor_consumibles" min="0" pattern="^[0-9]+"
                onpaste="return false;" onDrop="return false;">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Repuestos</label>
            <select onchange="seleccionarRepuesto();" class="form-control" id="slt_repuesto">
                <option selected value="">Seleccione...</option>
                @foreach ($repuestos as $value)
                    <option value="{{ $value->id_repuesto }}">{{ $value->nombre }}</option>
                @endforeach
            </select>
            <input type="hidden" class="form-control" id="hdd_valor_repuestos">
        </div>
        <div class="form-group col-md-6 container-repuestos">
            <div style="width:95%;">
                <label>Valor repuestos <i>(Pesos colombianos, sin comas ni puntos)</i></label>
                <input disabled type="number" class="form-control" id="txt_valor_repuestos" min="0">
            </div>
            <div style="width:5%; position: relative;">
                <button onclick="agregarRepuesto();" type="button" class="btn btn-primary btn-agregar" onclick="">+</button>
            </div>

        </div>
        <div class="form-group col-md-6 container-repuestos-responsive">
           
            <label>Valor repuestos <i>(Pesos colombianos, sin comas ni puntos)</i></label>
            <input disabled type="number" class="form-control" id="txt_valor_repuestos_r" min="0" >
    
        </div>
        <div class="form-group col-md-6 container-repuestos-responsive">
            <button onclick="agregarRepuesto();" type="button" class="btn btn-primary btn-agregar" onclick="">+</button>
        </div>
        
       
    </div>
    <div class="form-row"> 
        <div class="form-group col-md-6 container-repuestos-agregados">     
            <input type="hidden" id="hdd_cantidad_repuestos" value="0">
        </div>
    </div>
   
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Descripción repuestos</i></label>
            <textarea rows="3" class="form-control" id="txt_descripcion_repuestos" placeholder="..."></textarea>
        </div>
    </div>
    <div class="form-row guardar">
        <div class="form-group col-md-6">
            <label>Costo total de mantenimiento</i></label>
            <input disabled type="number" class="form-control" id="txt_valor_total">
        </div>
    </div>
    <div class="form-group col-md-12">
        <button type="button" onclick="calcularCosto()" class="btn btn-primary calcular">Calcular costo</button>
        <button type="button" onclick="generarCotizacionComuneros()" class="btn btn-primary guardar">Generar cotización con comuneros</button>

        <!--<button type="button" onclick="guardarInformacion()" class="btn btn-primary guardar">Guardar</button>-->
    </div>
</form>
@include('./formulario_comuneros')