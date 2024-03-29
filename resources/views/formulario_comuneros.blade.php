<form class="form-comuneros" style="margin-top:50px; display:none">
    <h2 class="text-center">Formulario para los comuneros</h2>
    

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Encargado del mantenimiento</label>
        
            <select onchange="consultarValorManoObra()" id="slt_perfiles_com" class="form-control">
                <option selected value="">Seleccione...</option>
               
                    @foreach ($perfiles as $value)
                        <option value="{{ $value->id_perfil }}">{{ $value->perfil }}</option>
                    @endforeach
             
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Valor mano de obra por hora</label>
            <input disabled type="number" class="form-control" id="txt_valor_mano_obra_com"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Tipo de mantenimiento</label>
            <!--<select onchange="seleccionarTipoMantenimiento()" id="slt_tipos_mantenimientos_com"
                class="form-control">
                <option selected value="">Seleccione...</option>
                @foreach ($tipos_mantenimientos as $value)
                    <option value="{{ $value->id_tipo }}">{{ $value->tipo_mantenimiento }}</option>
                @endforeach
            </select>-->
            <input disabled type="number" class="form-control" id="slt_tipos_mantenimientos_com"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
            <input disabled type="hidden" class="form-control" id="hdd_tipos_mantenimientos_com"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
        </div>
        <div class="form-group col-md-6">
            <label>Tiempo de mantenimiento<i>(horas)</i></label>
            <input disabled type="number" class="form-control" id="txt_tiempo_mantenimiento_com"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
            
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Año</label>
            <select onchange="calcularValorManoIPC()" id="slt_anios_com" class="form-control">
                <option selected value="">Seleccione...</option>
                @foreach ($anios as $value)
                    <option value="{{ $value->anio }}">{{ $value->anio }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Valor mano de obra con IPC</label>
            <input disabled type="text" class="form-control" id="txt_valor_mano_ipc_com">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            
            <label>Equipo</label>
            <!-- <select id="txt_equipo_com" class="form-control">
                <option selected value="">Seleccione...</option>
                @foreach ($equipos as $value)
                    <option value="{{ $value->nombre }}">{{ $value->nombre }}</option>
                @endforeach
            </select> -->
            <input disabled type="text" class="form-control" id="txt_equipo_com">

        </div>
        <div class="form-group col-md-6">
            <label>Serial / modelo</label>
            <input disabled type="text" class="form-control" id="txt_serial_com">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Valor herramientas <i>(Pesos colombianos, sin comas ni puntos)</i></label>
            <input type="number" class="form-control" id="txt_valor_herramientas_com"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
        </div>
        <div class="form-group col-md-6">
            <label>Valor consumibles  <i>(Pesos colombianos, sin comas ni puntos)</i></label>
            <input type="number" class="form-control" id="txt_valor_consumibles_com"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Valor repuestos <i>(Pesos colombianos, sin comas ni puntos)</i></label>
            <input type="number" class="form-control" id="txt_valor_repuestos_com"  min="0" pattern="^[0-9]+" onpaste="return false;" onDrop="return false;">
        </div>
    </div>
    <div  class="form-row">
        <div class="form-group col-md-6">
            <label>Descripción repuestos</i></label>
            <textarea rows="3" class="form-control" id="txt_descripcion_repuestos_com" placeholder="..."></textarea>
        </div>
    </div>
    <div class="form-row guardar">
        <div class="form-group col-md-6">
            <label>Costo total de mantenimiento</i></label>
            <input disabled type="number" class="form-control" id="txt_valor_total_com" value="0">
        </div>
    </div>
    <div class="form-group col-md-12">
        <button type="button" onclick="calcularCostoCom()" class="btn btn-primary calcular">Calcular costo</button>
        <button type="button" style="display:none; margin-top:20px;" onclick="guardarInformacion()" class="btn btn-primary guardar-datos">Guardar</button>
    </div>
</form>