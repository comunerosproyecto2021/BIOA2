const consultarMantenimientos = () => {
    $("#spn_mensaje_error").empty();
    if (validarFormularioFiltros()) {
        datos = construirDatosReporte();
        setAjax(
            $("#hdd_route_consultar_mantenimientos").val(),
            datos,
            "continuarConsultarMantenimientos"
        );
    } else {
        $("#spn_mensaje_error").append(
            "<i class='error-text'>Por favor, seleccione por lo menos una empresa y un año para realizar la búsqueda de los datos.</i>"
        );
    }
};

const construirDatosReporte = () => {
    let cantidad_empresas = $("#hdd_cantidad_empresas").val();
    let cantidad_anios = $("#hdd_cantidad_anios").val();
    let datos = {};

    for (let i = 1; i < cantidad_empresas; i++) {
        if ($("#chk_empresa_" + i).prop("checked")) {
            datos["empresa_" + i] = $("#chk_empresa_" + i).val();
        } else {
            datos["empresa_" + i] = "";
        }
    }

    for (let i = 1; i < cantidad_anios; i++) {
        if ($("#chk_anio_" + i).prop("checked")) {
            datos["anio_" + i] = $("#chk_anio_" + i).val();
        } else {
            datos["anio_" + i] = "";
        }
    }
    if($("#slt_equipo").val() != "") {
        datos["equipo"] = $("#slt_equipo").val();
    }else{
        datos["equipo"] = "";
    }

    return datos;
};

const continuarConsultarMantenimientos = (respuesta) => {
    $("#table_mantenimientos_container").empty();
    let html = "";
    if (respuesta.message.length > 0) {
        html += `<table class="table table-striped">
                    <thead>
                        <tr>
                            <th style='width:10%' scope="col">Equipo</th>
                            <th style='width:10%' scope="col">Vlr herramientas</th>
                            <th style='width:10%' scope="col">Vlr consumibles</th>
                            <th style='width:10%' scope="col">Vlr repuestos</th>
                            <th style='width:10%' scope="col">Tiempo</th>
                            <th style='width:10%' scope="col">Total</th>
                            <th style='width:10%' scope="col">Anio</th>
                            <th style='width:10%' scope="col">Empresa</th>
                        </tr>
                    </thead>
                    <tbody>`;
        respuesta.message.forEach((element) => {
            html += `<tr>
                            <td style='width:10%'>${element.nombre_equipo}</td>
                            <td style='width:10%'>${element.valor_herramienta}</td>
                            <td style='width:10%'>${element.valor_consumibles}</td>
                            <td style='width:10%'>${element.valor_repuestos}</td>
                            <td style='width:10%'>${element.tiempo_mantenimiento}</td>
                            <td style='width:10%'>${element.valor_total}</td>
                            <td style='width:10%'>${element.anio_cotizacion}</td>
                            <td style='width:10%'>${element.empresa}</td>
                        </tr>`;
        });

        html += `   </tbody>
                    </table>
                    <div class='container_button_pdf'>
                        <div class="col-4">
                            <button type='button' onclick='descargarPDF();'  class='btn btn-primary'>Descargar PDF</button>
                        </div>    
                    </div>`;
    }
    $("#table_mantenimientos_container").append(html);
};

const validarFormularioFiltros = () => {
    let validar = true;

    if (
        !$("#chk_empresa_1").prop("checked") &&
        !$("#chk_empresa_2").prop("checked") &&
        !$("#chk_empresa_3").prop("checked") &&
        !$("#chk_empresa_4").prop("checked")
    ) {
        agregarClaseError("chk_empresa_1");
        agregarClaseError("chk_empresa_2");
        agregarClaseError("chk_empresa_3");
        agregarClaseError("chk_empresa_4");

        validar = false;
    } else {
        quitarClaseError("chk_empresa_1");
        quitarClaseError("chk_empresa_2");
        quitarClaseError("chk_empresa_3");
        quitarClaseError("chk_empresa_4");
    }
    if (
        !$("#chk_anio_1").prop("checked") &&
        !$("#chk_anio_2").prop("checked") &&
        !$("#chk_anio_3").prop("checked") &&
        !$("#chk_anio_4").prop("checked") &&
        !$("#chk_anio_5").prop("checked")
    ) {
        agregarClaseError("chk_anio_1");
        agregarClaseError("chk_anio_2");
        agregarClaseError("chk_anio_3");
        agregarClaseError("chk_anio_4");
        agregarClaseError("chk_anio_5");


        validar = false;
    } else {
        quitarClaseError("chk_anio_1");
        quitarClaseError("chk_anio_2");
        quitarClaseError("chk_anio_3");
        quitarClaseError("chk_anio_4");
        quitarClaseError("chk_anio_5");
    }

    return validar;
};

const descargarPDF = () => {
    $("#spn_mensaje_error").empty();
    if (validarFormularioFiltros()) {
      
        Swal.fire({
            title: "Generando PDF",
            html: "Por favor, espere mientras se genera el documento PDF",
            timerProgressBar: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            
            didOpen: () => {
                Swal.showLoading();
            },
        });
        datos = construirDatosReporte();
        $.ajax({
            type: "GET",
            url: $("#hdd_route_descargar_pdf").val(),
            data: datos,
            xhrFields: {
                responseType: "blob",
            },

            success: function (response) {
                swal.close();
                var blob = new Blob([response]);
                var link = document.createElement("a");
                link.href = window.URL.createObjectURL(blob);
                link.download = "Reporte_cotizacion_mantenimientos.pdf";
                link.click();
            },


            error: function (xhr, ajaxOptions, thrownError) {
                console.error(xhr);
                console.error(ajaxOptions);
                console.error(thrownError);
                swal.close();
            },
        });
    }
};
