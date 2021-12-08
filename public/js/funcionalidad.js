const guardarInformacion = () => {
    if (validarFormulario()) {
        datos={}
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
