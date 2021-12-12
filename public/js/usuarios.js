const registrarUsuario = () => {
    if (validarFormularioRegistro()) {
        let datos = {
            nombres: $("#txt_nombres").val(),
            apellidos: $("#txt_apellidos").val(),
            nombre_usuario: $("#txt_nombre_usuario").val(),
            contrasena: $("#txt_contrasena").val(),
            correo: $("#txt_correo").val(),
        };
        setAjax(
            $("#hdd_ruta_registrar_usuario").val(),
            datos,
            "continuarRegistrarUsuario"
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

const continuarRegistrarUsuario = (respuesta) => {
    mostrarAlerta(respuesta);
}

const validarFormularioRegistro = () => {
    let validacion = true;

    if ($("#txt_nombres").val() == "") {
        validacion = false;
        agregarClaseError("txt_nombres");
    } else {
        quitarClaseError("txt_nombres");
    }
    if ($("#txt_apellidos").val() == "") {
        validacion = false;
        agregarClaseError("txt_apellidos");
    } else {
        quitarClaseError("txt_apellidos");
    }
    if ($("#txt_nombre_usuario").val() == "") {
        validacion = false;
        agregarClaseError("txt_nombre_usuario");
    } else {
        quitarClaseError("txt_nombre_usuario");
    }
    if ($("#txt_contrasena").val() == "") {
        validacion = false;
        agregarClaseError("txt_contrasena");
    } else {
        quitarClaseError("txt_contrasena");
    }
    if ($("#txt_correo").val() == "") {
        validacion = false;
        agregarClaseError("txt_correo");
    } else {
        quitarClaseError("txt_correo");
    }
    

    return validacion;
};
