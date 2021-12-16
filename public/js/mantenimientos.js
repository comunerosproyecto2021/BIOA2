const consultarDatos = () => {
 let cantidad_empresas = $("#hdd_cantidad_empresas").val();
 let cantidad_anios = $("#hdd_cantidad_anios").val();
 let data = {};
for (let i = 1; i<cantidad_empresas; i++) {
    if($('#chk_empresa_'+i).prop('checked')){
        
        console.log($("#chk_empresa_"+i).val());
    }
}

for (let i = 1; i<cantidad_anios; i++) {
    if($('#chk_anio_'+i).prop('checked')){
        console.log($("#chk_anio_"+i).val());
    }
 }
};
