const consultarMantenimientos = () => {
    $("#spn_mensaje_error").empty();
    if(validarFormularioFiltros()){
          
        datos = construirDatosReporte();
        setAjax(
            $("#hdd_route_consultar_mantenimientos").val(),
            datos,
            "continuarConsultarMantenimientos"
        );

    } else {

        $("#spn_mensaje_error").append("<i class='error-text'>Por favor, seleccione por lo menos una empresa y un año para realizar la búsqueda de los datos.</i>");
    }
};

const construirDatosReporte = () => {

    let cantidad_empresas = $("#hdd_cantidad_empresas").val();
    let cantidad_anios = $("#hdd_cantidad_anios").val();
    let datos = {};

    for (let i = 1; i < cantidad_empresas; i++) {
        if ($("#chk_empresa_" + i).prop("checked")) {
            datos["empresa_" + i] = $("#chk_empresa_" + i).val();
        }else{
            datos["empresa_" + i] = "";
        }
    }

    for (let i = 1; i < cantidad_anios; i++) {
        if ($("#chk_anio_" + i).prop("checked")) {
            datos["anio_" + i] = $("#chk_anio_" + i).val();
        }else{
            datos["anio_" + i] = "";
        }
    }

    return datos;
}

const continuarConsultarMantenimientos = (respuesta) => {
    $("#table_mantenimientos_container").empty();
    let html = "";
    if(respuesta.message.length>0){

        html += `<table class="table table-striped">
                    <thead>
                        <tr>
                            <th style='width:10%' scope="col">Equipo</th>
                            <th style='width:10%' scope="col">Vlr herramientas</th>
                            <th style='width:10%' scope="col">Vlr consumibles</th>
                            <th style='width:10%' scope="col">Vlr repuestos</th>
                            <th style='width:10%' scope="col">Vlr hora</th>
                            <th style='width:10%' scope="col">Tiempo</th>
                            <th style='width:10%' scope="col">Total</th>
                            <th style='width:10%' scope="col">Empresa</th>
                        </tr>
                    </thead>
                    <tbody>`;
            respuesta.message.forEach(element => {
                
                html +=`<tr>
                            <td style='width:10%'>${element.nombre_equipo}</td>
                            <td style='width:10%'>${element.valor_herramienta}</td>
                            <td style='width:10%'>${element.valor_consumibles}</td>
                            <td style='width:10%'>${element.valor_repuestos}</td>
                            <td style='width:10%'>200000</td>
                            <td style='width:10%'>${element.tiempo_mantenimiento}</td>
                            <td style='width:10%'>${element.valor_total}</td>
                            <td style='width:10%'>${element.empresa}</td>
                        </tr>`; 
            });
            
            html += `   </tbody>
                    </table>
                    <div class='container_button_pdf'>
                        <button type='button' onclick='descargarPDF();'  class='btn btn-primary'>Descargar PDF</button>
                    </div>`;        
            

    }
    $("#table_mantenimientos_container").append(html);
}


const validarFormularioFiltros = () =>{
    let validar=true;

    if(!$("#chk_empresa_1").prop("checked") && !$("#chk_empresa_2").prop("checked")){
        agregarClaseError("chk_empresa_1");
        agregarClaseError("chk_empresa_2");
        
        validar=false;
    }else{
        quitarClaseError("chk_empresa_1");
        quitarClaseError("chk_empresa_2");
    }
    if(!$("#chk_anio_1").prop("checked") && !$("#chk_anio_2").prop("checked") && !$("#chk_anio_3").prop("checked") && !$("#chk_anio_4").prop("checked")){
        
        agregarClaseError("chk_anio_1");
        agregarClaseError("chk_anio_2");
        agregarClaseError("chk_anio_3");
        agregarClaseError("chk_anio_4");
    
        validar=false;

    }else{
        quitarClaseError("chk_anio_1");
        quitarClaseError("chk_anio_2");
        quitarClaseError("chk_anio_3");
        quitarClaseError("chk_anio_4"); 
    }

    return validar;

}


const descargarPDF = () => {
    $("#spn_mensaje_error").empty();
    if(validarFormularioFiltros()){
        datos = construirDatosReporte();
        
       $.ajax({ 

            type: 'GET', 

            url: $("#hdd_route_descargar_pdf").val(), 

            data: datos, 

            xhrFields: { 

                responseType: 'blob' 

            }, 

            success: function(response){ 
                
                var blob = new Blob([response]); 
                var link = document.createElement('a'); 
                link.href = window.URL.createObjectURL(blob); 
                link.download = "Reporte_cotizacion_mantenimientos.pdf"; 
                link.click(); 
            }, 

            error: function (xhr, ajaxOptions, thrownError) {
                console.error(xhr);
             
            }

        }); 
        /*setAjax(
            $("#hdd_route_descargar_pdf").val(),
            datos,
            "continuarDescargarPDF"
        );*/
    } 
   
}

const continuarDescargarPDF = (response) => {
    //var blob = new Blob([response]); 

    /*var link = document.createElement('a'); 

    link.href = window.URL.createObjectURL(blob); 

    link.download = "Sample.pdf"; 

    link.click(); */
    console.log(response);
}