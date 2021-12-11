const guardarInformacion = () => {
    if (validarFormulario()) {
        datos = {};
        setAjax("", datos, "");
    } else {
        Swal.fire({
            title: "Error!",
            text: "Debe rellenar todos los campos del formulario",
            icon: "error",
            confirmButtonText: "Aceptar",
        });
    }
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
    if ($("#txt_ipc").val().trim() == "") {
        validacion = false;
        agregarClaseError("txt_ipc");
    } else {
        quitarClaseError("txt_ipc");
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

const consultarIPC = () => {
    if ($("#slt_anios").val() != "") {
        let datos = { anio: $("#slt_anios").val() };
        setAjax(
            $("#hdd_ruta_consultar_ipc").val(),
            datos,
            "continuarConsultarIPC"
        );
    }
};

const continuarConsultarIPC = (response) => {
    $("#txt_ipc").val("");
    $("#txt_ipc").val(response.message[0]["ipc"] + "%");
};

const seleccionarTipoMantenimiento = () => {
    $("#txt_tiempo_mantenimiento").prop("disabled", true); 
    $("#txt_tiempo_mantenimiento").val("");
    if ($("#slt_tipos_mantenimientos").val() == 1) {
        //Correctivo
        $("#txt_tiempo_mantenimiento").prop("disabled", false); 
    } else if ($("#slt_tipos_mantenimientos").val() == 2) {
        //Preventivo
        $("#txt_tiempo_mantenimiento").val("2");
    }
};


const consultarValorManoObra = () =>{
    if ($("#slt_perfiles").val() != "") {
        let datos = { perfil: $("#slt_perfiles").val() };
        setAjax(
            $("#hdd_ruta_consultar_mano_obra").val(),
            datos,
            "continuarconsultarValorManoObra"
        );
    }
    
}
const continuarconsultarValorManoObra = (response) => {

    $("#txt_valor_mano_obra").val("");
    $("#txt_valor_mano_obra").val(response.message[0]["precio_hora"]);

}