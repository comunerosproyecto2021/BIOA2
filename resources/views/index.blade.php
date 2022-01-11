<form>
    <h2 class="text-center">Formulario de cotización de mantenimientos</h2>
    <input type="hidden" name="hdd_ruta_consultar_ipc" id="hdd_ruta_consultar_ipc" value="{{ url('/ipc') }}">
    <input type="hidden" name="hdd_ruta_consultar_mano_obra" id="hdd_ruta_consultar_mano_obra" value="{{ url('/vlr_hora') }}">
    <input type="hidden" name="hdd_guardar_datos" id="hdd_guardar_datos" value="{{ url('/guardar_datos') }}">
    <input type="hidden" name="hdd_id_usuario" id="hdd_id_usuario" value="{{session('id_usuario')}}">
    <input type="hidden" name="hdd_id_empresa" id="hdd_id_empresa" value="{{session('id_empresa')}}">
    <input type="hidden" name="hdd_ipc_2016" id="hdd_ipc_2016" value="{{ $ipc_2016[0]->ipc}}">
    <input type="hidden" name="hdd_ipc_2017" id="hdd_ipc_2017" value="{{ $ipc_2017[0]->ipc}}">
    <input type="hidden" name="hdd_ipc_2018" id="hdd_ipc_2018" value="{{ $ipc_2018[0]->ipc}}">
    <input type="hidden" name="hdd_ipc_2019" id="hdd_ipc_2019" value="{{ $ipc_2019[0]->ipc}}">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Encargado del mantenimiento</label>
        
            <select onchange="consultarValorManoObra()" id="slt_perfiles" class="form-control">
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
            <input disabled type="number" class="form-control" id="txt_valor_mano_obra"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
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
            <label>Tiempo de mantenimiento<i>(horas)</i></label>
            <input disabled type="number" class="form-control" id="txt_tiempo_mantenimiento"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Año</label>
            <select onchange="calcularValorManoIPC()" id="slt_anios" class="form-control">
                <option selected value="">Seleccione...</option>
                @foreach ($anios as $value)
                    <option value="{{ $value->anio }}">{{ $value->anio }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Valor mano de obra con IPC</label>
            <input disabled type="text" class="form-control" id="txt_valor_mano_ipc">
        </div>
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
            <input type="number" class="form-control" id="txt_valor_herramientas"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
        </div>
        <div class="form-group col-md-6">
            <label>Valor consumibles  <i>(Pesos colombianos, sin comas ni puntos)</i></label>
            <input type="number" class="form-control" id="txt_valor_consumibles"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Valor repuestos <i>(Pesos colombianos, sin comas ni puntos)</i></label>
            <input type="number" class="form-control" id="txt_valor_repuestos"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
        </div>
    </div>
    <div  class="form-row">
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
        <button type="button" onclick="guardarInformacion()" class="btn btn-primary guardar">Guardar</button>
    </div>
</form>