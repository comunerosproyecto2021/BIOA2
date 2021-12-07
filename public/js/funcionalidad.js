const guardarInformacion = () => {

    if(validarFormulario()){
        console.log("Excelente");
    }else{
        Swal.fire({
            title: 'Error!',
            text: 'Do you want to continue',
            icon: 'error',
            confirmButtonText: 'Cool'
          })
    }
};

const validarFormulario = () => {
    let validacion = true;

    if ($("#slt_perfiles").val() == "") {
        validacion = false;
    }
    if ($("#slt_tipos_mantenimientos").val() == "") {
        validacion = false;
    }
    if ($("#slt_anios").val() == "") {
        validacion = false;
    }
    if ($("#txt_ipc").val() == "") {
        validacion = false;
    }
    if ($("#txt_equipo").val() == "") {
        validacion = false;
    }
    if ($("#txt_serial").val() == "") {
        validacion = false;
    }

    return validacion;
};
