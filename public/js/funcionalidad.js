const calcularCosto = () => {
    if (validarFormulario()) {
        let valor_total = sumatoriaCostos();
        $(".guardar").css("display", "block");
        $("#txt_valor_total").val(valor_total);
    } else {
        Swal.fire({
            title: "Error!",
            text: "Debe rellenar todos los campos del formulario, antes de calcular los costos",
            icon: "error",
            confirmButtonText: "Aceptar",

            confirmButtonColor: "#f27474",
        });
    }
};

const calcularValoresIPC = () => {
    let valor_mano = $("#txt_valor_mano_obra_com").val();

    let ipc_2016 = $("#hdd_ipc_2016").val() / 100;
    let ipc_2017 = $("#hdd_ipc_2017").val() / 100;
    let ipc_2018 = $("#hdd_ipc_2018").val() / 100;
    let ipc_2019 = $("#hdd_ipc_2019").val() / 100;
    let ipc_2020 = $("#hdd_ipc_2020").val() / 100;

    let valor_mano_ipc = 0;
    let calculo = 0;

    switch (parseInt($("#slt_anios_com").val())) {
        case 2016:
            calculo =
                valor_mano * ipc_2016 +
                valor_mano * ipc_2017 +
                valor_mano * ipc_2018 +
                valor_mano * ipc_2019 +
                valor_mano * ipc_2020;
            valor_mano_ipc = valor_mano - calculo;
            break;
        case 2017:
            calculo =
                valor_mano * ipc_2017 +
                valor_mano * ipc_2018 +
                valor_mano * ipc_2019 +
                valor_mano * ipc_2020;
            valor_mano_ipc = valor_mano - calculo;
            break;
        case 2018:
            calculo =
                valor_mano * ipc_2018 +
                valor_mano * ipc_2019 +
                valor_mano * ipc_2020;
            valor_mano_ipc = valor_mano - calculo;
            break;
        case 2019:
            calculo = valor_mano * ipc_2019 + valor_mano * ipc_2020;
            valor_mano_ipc = valor_mano - calculo;
            break;
        case 2020:
            calculo = valor_mano * ipc_2020;
            valor_mano_ipc = valor_mano - calculo;
            break;
    }

    return valor_mano_ipc;
};

const calcularValoresIPCRepuestos = (valor_repuesto) => {
    let ipc_2016 = $("#hdd_ipc_2016").val() / 100;
    let ipc_2017 = $("#hdd_ipc_2017").val() / 100;
    let ipc_2018 = $("#hdd_ipc_2018").val() / 100;
    let ipc_2019 = $("#hdd_ipc_2019").val() / 100;
    let ipc_2020 = $("#hdd_ipc_2020").val() / 100;

    let valor_repuesto_ipc = 0;
    let calculo = 0;

    switch (parseInt($("#slt_anios").val())) {
        case 2016:
            calculo =
                valor_repuesto * ipc_2016 +
                valor_repuesto * ipc_2017 +
                valor_repuesto * ipc_2018 +
                valor_repuesto * ipc_2019 +
                valor_repuesto * ipc_2020;
            valor_repuesto_ipc = valor_repuesto - calculo;
            break;
        case 2017:
            calculo =
                valor_repuesto * ipc_2017 +
                valor_repuesto * ipc_2018 +
                valor_repuesto * ipc_2019 +
                valor_repuesto * ipc_2020;
            valor_repuesto_ipc = valor_repuesto - calculo;
            break;
        case 2018:
            calculo =
                valor_repuesto * ipc_2018 +
                valor_repuesto * ipc_2019 +
                valor_repuesto * ipc_2020;
            valor_repuesto_ipc = valor_repuesto - calculo;
            break;
        case 2019:
            calculo = valor_repuesto * ipc_2019 + valor_repuesto * ipc_2020;
            valor_repuesto_ipc = valor_repuesto - calculo;
            break;
        case 2020:
            calculo = valor_repuesto * ipc_2020;
            valor_repuesto_ipc = valor_repuesto - calculo;
            break;
    }

    return valor_repuesto_ipc;
};

const sumatoriaCostos = () => {
    let valorManoObra = parseInt($("#txt_valor_mano_obra").val().trim());
    let horas = parseInt($("#txt_tiempo_mantenimiento").val().trim());
    let valor_herramientas = parseInt(
        $("#txt_valor_herramientas").val().trim()
    );
    let valor_consumibles = parseInt($("#txt_valor_consumibles").val().trim());
    let valor_total =
        valorManoObra * horas + valor_herramientas + valor_consumibles;
    let valor_repuestos = 0;
    let cantidad_repuestos = $("#hdd_cantidad_repuestos").val();

    for (let e = 0; e <= cantidad_repuestos; e++) {
        valor_repuestos += parseInt($("#hdd_vlr_repuesto_" + e).val());
    }
    if(isNaN(valor_repuestos)) {
        valor_repuestos = 0;
    }
    $("#hdd_valor_repuestos").val(valor_repuestos);
    return valor_total + valor_repuestos;
};

const guardarInformacion = () => {
    if (validarFormulario()) {
        datos = {
            //Datos formulario principal
            encargado: $("#slt_perfiles").val(),
            vlr_obra: $("#txt_valor_mano_obra").val().trim(),
            tipo_mant: $("#slt_tipos_mantenimientos").val(),
            tiempo_mantenimiento: $("#txt_tiempo_mantenimiento").val().trim(),
            anio: $("#slt_anios").val(),
            nombre_equipo: $("#txt_equipo").val().trim(),
            serial: $("#txt_serial").val().trim(),
            valor_herramientas: $("#txt_valor_herramientas").val().trim(),
            valor_consumibles: $("#txt_valor_consumibles").val().trim(),
            valor_repuestos: $("#hdd_valor_repuestos").val().trim(),
            /*valor_mano_ipc: $("#txt_valor_mano_ipc").val(),*/
            descripcion_repuestos: $("#txt_descripcion_repuestos").val().trim(),
            valor_total: $("#txt_valor_total").val().trim(),
            id_usuario: $("#hdd_id_usuario").val(),
            id_empresa: $("#hdd_id_empresa").val(),

            //Datos del formulario comuneros
            encargado_com: $("#slt_perfiles_com").val(),
            vlr_obra_com: $("#txt_valor_mano_obra_com").val().trim(),
            tipo_mant_com: $("#hdd_tipos_mantenimientos_com").val(),
            tiempo_mantenimiento_com: $("#txt_tiempo_mantenimiento_com")
                .val()
                .trim(),
            anio_com: $("#slt_anios_com").val(),
            nombre_equipo_com: $("#txt_equipo_com").val().trim(),
            serial_com: $("#txt_serial_com").val().trim(),
            valor_herramientas_com: $("#txt_valor_herramientas_com")
                .val()
                .trim(),
            valor_consumibles_com: $("#txt_valor_consumibles_com").val().trim(),
            valor_repuestos_com: $("#txt_valor_repuestos_com").val().trim(),
            valor_mano_ipc_com: $("#txt_valor_mano_ipc_com").val(),
            descripcion_repuestos_com: $("#txt_descripcion_repuestos_com")
                .val()
                .trim(),
            valor_total_com: $("#txt_valor_total_com").val().trim(),
            id_usuario_com: $("#hdd_id_usuario").val(),
            id_empresa_com: 1,
        };
        setAjax(
            $("#hdd_guardar_datos").val(),
            datos,
            "continuarGuardarInformacion"
        );
    } else {
        Swal.fire({
            title: "Error!",
            text: "Debe rellenar todos los campos del formulario",
            icon: "error",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#f27474",
        });
    }
};

const continuarGuardarInformacion = (respuesta) => {
    mostrarAlerta(respuesta);
};

const validarFormulario = () => {
    let validacion = true;

    if ($("#slt_perfiles").val() == "") {
        validacion = false;
        agregarClaseError("slt_perfiles");
    } else {
        quitarClaseError("slt_perfiles");
    }
    if ($("#slt_tipos_mantenimientos").val() == "") {
        validacion = false;
        agregarClaseError("slt_tipos_mantenimientos");
    } else {
        quitarClaseError("slt_tipos_mantenimientos");
    }
    if ($("#slt_anios").val() == "") {
        validacion = false;
        agregarClaseError("slt_anios");
    } else {
        quitarClaseError("slt_anios");
    }
    /* if ($("#txt_valor_mano_ipc").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_valor_mano_ipc");
    } else {
        quitarClaseError("txt_valor_mano_ipc");
    }*/
    if ($("#txt_equipo").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_equipo");
    } else {
        quitarClaseError("txt_equipo");
    }
    if ($("#txt_serial").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_serial");
    } else {
        quitarClaseError("txt_serial");
    }
    if ($("#txt_valor_mano_obra").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_valor_mano_obra");
    } else {
        quitarClaseError("txt_valor_mano_obra");
    }
    if ($("#txt_tiempo_mantenimiento").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_tiempo_mantenimiento");
    } else {
        quitarClaseError("txt_tiempo_mantenimiento");
    }
    if ($("#txt_valor_herramientas").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_valor_herramientas");
    } else {
        quitarClaseError("txt_valor_herramientas");
    }
    if ($("#txt_valor_consumibles").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_valor_consumibles");
    } else {
        quitarClaseError("txt_valor_consumibles");
    }
    /*if ($("#txt_valor_repuestos").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_valor_repuestos");
    } else {
        quitarClaseError("txt_valor_repuestos");
    }*/

    return validacion;
};

const agregarClaseError = (elemento) => {
    $("#" + elemento).addClass("error");
    $("#" + elemento)
        .prev()
        .addClass("error-text");

    $("#" + elemento).removeClass("success");
    $("#" + elemento)
        .prev()
        .removeClass("success-text");
};

const quitarClaseError = (elemento) => {
    $("#" + elemento).removeClass("error");
    $("#" + elemento)
        .prev()
        .removeClass("error-text");

    $("#" + elemento).addClass("success");
    $("#" + elemento)
        .prev()
        .addClass("success-text");
};

const calcularValorManoIPC = () => {
    $("#txt_valor_mano_ipc_com").val("");
    $("#txt_valor_mano_ipc_com").val(calcularValoresIPC());
};

const seleccionarTipoMantenimiento = () => {
    $("#txt_tiempo_mantenimiento").prop("disabled", true);
    $("#txt_tiempo_mantenimiento").val("");
    if ($("#slt_tipos_mantenimientos").val() == 2) {
        //Preventivo
        $("#txt_tiempo_mantenimiento").prop("disabled", false);
    } else if ($("#slt_tipos_mantenimientos").val() == 1) {
        //Correctivo
        $("#txt_tiempo_mantenimiento").val("2");
    }
};

const consultarValorManoObra = () => {
    if ($("#slt_perfiles_com").val() != "") {
        let datos = { perfil: $("#slt_perfiles_com").val() };
        setAjax(
            $("#hdd_ruta_consultar_mano_obra").val(),
            datos,
            "continuarconsultarValorManoObra"
        );
    }
};
const continuarconsultarValorManoObra = (response) => {
    $("#txt_valor_mano_obra_com").val("");
    $("#txt_valor_mano_obra_com").val(response.message[0]["precio_hora"]);
};

const mostrarAlerta = (respuesta) => {
    if (respuesta.success) {
        Swal.fire({
            title: "¡Registro exitoso!",
            text: respuesta.message,
            icon: "success",
            confirmButtonColor: "#00BFA6",
            confirmButtonText: "Aceptar",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace(respuesta.ruta);
            }
        });
    } else {
        let title = "Error interno";
        if (respuesta.title) {
            title = respuesta.title;
        }
        Swal.fire({
            title: title,
            text: respuesta.message,
            icon: "error",
            confirmButtonColor: "#f27474",
            confirmButtonText: "Aceptar",
        });
    }
};

const calcularCostoContrato = () => {
    if (validarFormularioContratos()) {
        let valor = 0;
        $("#txt_calculo_vlr").val("");
        $("#div_contrato").css("display", "block");
        valor =
            parseInt($("#txt_valor_contrato").val().trim()) /
            parseInt($("#txt_qty_equipos").val().trim());
        $("#txt_calculo_vlr").val("$" + valor);
        $(".siguiente").css("display", "block");
    } else {
    }
};

const validarFormularioContratos = () => {
    let validacion = true;
    if ($("#txt_valor_contrato").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_valor_contrato");
    } else {
        quitarClaseError("txt_valor_contrato");
    }

    if ($("#txt_valor_mano_obra").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_valor_mano_obra");
    } else {
        quitarClaseError("txt_valor_mano_obra");
    }
    if ($("#txt_qty_equipos").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_qty_equipos");
    } else {
        quitarClaseError("txt_qty_equipos");
    }

    return validacion;
};

const mostrarFormularioMantenimientos = () => {
    datos = {
        valor_contrato: $("#txt_valor_contrato").val().trim(),
        vlr_obra: $("#txt_valor_mano_obra").val().trim(),
        qty_equipos: $("#txt_qty_equipos").val().trim(),
        vlr_accesorios: $("#txt_vlr_accesorios").val().trim(),
        tiempo_contrato: $("#txt_tiempo_contrato").val().trim(),
        unidad_tiempo: $("#slt_unidad_tiempo").val().trim(),
        calculo_vlr: $("#txt_calculo_vlr").val().trim(),
    };
    setAjax(
        $("#hdd_formulario_mantenimientos").val(),
        datos,
        "continuarMostrarFormularioMantenimientos"
    );
};

const continuarMostrarFormularioMantenimientos = (response) => {
    $(".container-form").empty();
    $(".container-form").append(response);
};

const calcularValores = () => {
    let vlr_contrato = $("#hdd_valor_contrato").val();
    let vlr_mano = vlr_contrato / 12 / 30 / 8;
    $("#txt_valor_mano_obra").val(vlr_mano);

    if ($("#hdd_vlr_accesorios").val() != "") {
        let vlr_accesorios = $("#hdd_vlr_accesorios").val();
        let vlr_herramienta = (vlr_accesorios * 0.1) / 12 / (142 * 2);
        $("#txt_valor_herramientas").val(vlr_herramienta);
        let consumibles = (vlr_accesorios * 0.5) / 12 / (142 * 2);
        $("#txt_valor_consumibles").val(consumibles);
    } else {
        $("#txt_valor_herramientas").prop("disabled", false);
        $("#txt_valor_consumibles").prop("disabled", false);
    }
};

const seleccionarRepuesto = () => {
    datos = {
        repuesto: $("#slt_repuesto").val(),
    };
    if ($("#slt_repuesto").val() == 0) {

        $('#txt_valor_repuestos').prop("disabled", false);
        $('#txt_valor_repuestos_r').prop("disabled", false);
        
    } else {
        $('#txt_valor_repuestos').prop("disabled", true);
        $('#txt_valor_repuestos_r').prop("disabled", true);
        setAjax(
            $("#hdd_ruta_consultar_repuesto").val(),
            datos,
            "continuarSeleccionarRepuesto"
        );
    }
};
const continuarSeleccionarRepuesto = (respuesta) => {
    if (respuesta.message.length > 0) {
        let precio_repuesto = respuesta.message[0].precio;
        precio_repuesto = calcularValoresIPCRepuestos(precio_repuesto);
        $("#txt_valor_repuestos").val(precio_repuesto);
        $("#txt_valor_repuestos_r").val(precio_repuesto);
    }
};

let aux = 0;
const agregarRepuesto = () => {
    if (
        $("#txt_valor_repuestos").val() != "" ||
        $("#txt_valor_repuestos_r").val() != ""
    ) {
        let vlr_repuesto =
            $("#txt_valor_repuestos").val() == ""
                ? $("#txt_valor_repuestos_r").val()
                : $("#txt_valor_repuestos").val();
        let nombre = $("#slt_repuesto option:selected").html();

        let html = `
            <input disabled type="number" class="form-control" id="txt_repuesto_agregado_${aux}" placeholder="${nombre} - $${vlr_repuesto}" value="${nombre}">
            <input type="hidden" id="hdd_vlr_repuesto_${aux}" value="${vlr_repuesto}">
        `;
        $(".container-repuestos-agregados").append(html);
        $("#hdd_cantidad_repuestos").val(aux);

        aux++;
        $("#txt_valor_repuestos").val("");
        $("#txt_valor_repuestos_r").val("");
        $("#slt_repuesto").val("");
    }
};

const generarCotizacionComuneros = () => {
    $(".form-comuneros").css("display", "block");

    //Se replican los datos
    $("#hdd_tipos_mantenimientos_com").val(
        $("#slt_tipos_mantenimientos").val()
    );
    $("#slt_tipos_mantenimientos_com").attr(
        "placeholder",
        $("#slt_tipos_mantenimientos option:selected").html()
    );
    $("#txt_tiempo_mantenimiento_com").val(
        $("#txt_tiempo_mantenimiento").val()
    );
    $("#txt_equipo_com").val($("#txt_equipo").val());
    $("#txt_serial_com").val($("#txt_serial").val());
    $("#txt_descripcion_repuestos_com").val(
        $("#txt_descripcion_repuestos").val()
    );
};

const calcularCostoCom = () => {
    if (validarFormularioComuneros()) {
        let valor_total = sumatoriaCostosComuneros();
        $(".guardar-datos").css("display", "block");
        $("#txt_valor_total_com").val(valor_total);
    } else {
        Swal.fire({
            title: "Error!",
            text: "Debe rellenar todos los campos del formulario, antes de calcular los costos",
            icon: "error",
            confirmButtonText: "Aceptar",

            confirmButtonColor: "#f27474",
        });
    }
};

const validarFormularioComuneros = () => {
    let validacion = true;

    if ($("#slt_perfiles_com").val() == "") {
        validacion = false;
        agregarClaseError("slt_perfiles_com");
    } else {
        quitarClaseError("slt_perfiles_com");
    }
    /*if ($("#slt_tipos_mantenimientos_com").val() == "") {
        validacion = false;
        agregarClaseError("slt_tipos_mantenimientos_com");
    } else {
        quitarClaseError("slt_tipos_mantenimientos_com");
    }*/
    if ($("#slt_anios_com").val() == "") {
        validacion = false;
        agregarClaseError("slt_anios_com");
    } else {
        quitarClaseError("slt_anios_com");
    }
    if ($("#txt_valor_mano_ipc_com").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_valor_mano_ipc_com");
    } else {
        quitarClaseError("txt_valor_mano_ipc_com");
    }
    if ($("#txt_equipo_com").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_equipo_com");
    } else {
        quitarClaseError("txt_equipo_com");
    }
    if ($("#txt_serial_com").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_serial_com");
    } else {
        quitarClaseError("txt_serial_com");
    }
    if ($("#txt_valor_mano_obra_com").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_valor_mano_obra_com");
    } else {
        quitarClaseError("txt_valor_mano_obra_com");
    }
    if ($("#txt_tiempo_mantenimiento_com").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_tiempo_mantenimiento_com");
    } else {
        quitarClaseError("txt_tiempo_mantenimiento_com");
    }
    if ($("#txt_valor_herramientas_com").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_valor_herramientas_com");
    } else {
        quitarClaseError("txt_valor_herramientas_com");
    }
    if ($("#txt_valor_consumibles_com").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_valor_consumibles_com");
    } else {
        quitarClaseError("txt_valor_consumibles_com");
    }
    if ($("#txt_valor_repuestos_com").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_valor_repuestos_com");
    } else {
        quitarClaseError("txt_valor_repuestos_com");
    }

    return validacion;
};

const sumatoriaCostosComuneros = () => {
    let valorManoObra = parseInt($("#txt_valor_mano_ipc_com").val().trim());
    let horas = parseInt($("#txt_tiempo_mantenimiento_com").val().trim());
    let valor_herramientas = parseInt(
        $("#txt_valor_herramientas_com").val().trim()
    );
    let valor_consumibles = parseInt(
        $("#txt_valor_consumibles_com").val().trim()
    );
    let valor_repuestos = parseInt($("#txt_valor_repuestos_com").val().trim());
    let valor_total =
        valorManoObra * horas +
        valor_herramientas +
        valor_consumibles +
        valor_repuestos;

    return valor_total;
};
