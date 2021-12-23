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
    let valor_mano = $("#txt_valor_mano_obra").val();
   
    let ipc_2016 = $("#hdd_ipc_2016").val() / 100;
    let ipc_2017 = $("#hdd_ipc_2017").val() / 100;
    let ipc_2018 = $("#hdd_ipc_2018").val() / 100;
    let ipc_2019 = $("#hdd_ipc_2019").val() / 100;
  
    let valor_mano_ipc = 0;
    let calculo = 0;

    switch (parseInt($("#slt_anios").val())) {
        case 2016:
            calculo =
                valor_mano * ipc_2016 +
                valor_mano * ipc_2017 +
                valor_mano * ipc_2018 +
                valor_mano * ipc_2019;
            valor_mano_ipc = valor_mano - calculo;
        break;
        case 2017:
            calculo =
                valor_mano * ipc_2017 +
                valor_mano * ipc_2018 +
                valor_mano * ipc_2019;
            valor_mano_ipc = valor_mano - calculo;
        break;
        case 2018:
            calculo =
                valor_mano * ipc_2018 +
                valor_mano * ipc_2019;
            valor_mano_ipc = valor_mano - calculo;
        break;
        case 2019:
            calculo =
                valor_mano * ipc_2019;
            valor_mano_ipc = valor_mano - calculo;
        break;
    }
  
    return valor_mano_ipc;
} 


const sumatoriaCostos = () => {
    let valorManoObra = parseInt($("#txt_valor_mano_ipc").val().trim());
    let horas = parseInt($("#txt_tiempo_mantenimiento").val().trim());
    let valor_herramientas = parseInt(
        $("#txt_valor_herramientas").val().trim()
    );
    let valor_consumibles = parseInt($("#txt_valor_consumibles").val().trim());
    let valor_repuestos = parseInt($("#txt_valor_repuestos").val().trim());
    let valor_total =
        valorManoObra * horas +
        valor_herramientas +
        valor_consumibles +
        valor_repuestos;
    return valor_total;
};

const guardarInformacion = () => {
    if (validarFormulario()) {
        datos = {
            encargado: $("#slt_perfiles").val(),
            vlr_obra: $("#txt_valor_mano_obra").val().trim(),
            tipo_mant: $("#slt_tipos_mantenimientos").val(),
            tiempo_mantenimiento: $("#txt_tiempo_mantenimiento").val().trim(),
            anio: $("#slt_anios").val(),
            nombre_equipo: $("#txt_equipo").val().trim(),
            serial: $("#txt_serial").val().trim(),
            valor_herramientas: $("#txt_valor_herramientas").val().trim(),
            valor_consumibles: $("#txt_valor_consumibles").val().trim(),
            valor_repuestos: $("#txt_valor_repuestos").val().trim(),
            valor_mano_ipc: $("#txt_valor_mano_ipc").val(),
            descripcion_repuestos: $("#txt_descripcion_repuestos").val().trim(),
            valor_total: $("#txt_valor_total").val().trim(),
            id_usuario: $("#hdd_id_usuario").val(),
            id_empresa: $("#hdd_id_empresa").val(),
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
    if ($("#txt_valor_mano_ipc").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_valor_mano_ipc");
    } else {
        quitarClaseError("txt_valor_mano_ipc");
    }
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
    if ($("#txt_valor_repuestos").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_valor_repuestos");
    } else {
        quitarClaseError("txt_valor_repuestos");
    }

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
    $("#txt_valor_mano_ipc").val("");
    $("#txt_valor_mano_ipc").val(calcularValoresIPC());
   
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
    if ($("#slt_perfiles").val() != "") {
        let datos = { perfil: $("#slt_perfiles").val() };
        setAjax(
            $("#hdd_ruta_consultar_mano_obra").val(),
            datos,
            "continuarconsultarValorManoObra"
        );
    }
};
const continuarconsultarValorManoObra = (response) => {
    $("#txt_valor_mano_obra").val("");
    $("#txt_valor_mano_obra").val(response.message[0]["precio_hora"]);  
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
