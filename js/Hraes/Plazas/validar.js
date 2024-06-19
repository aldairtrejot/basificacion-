function validar(){
    let id_cat_plazas = document.getElementById('id_cat_plazas').value.trim();
    let id_cat_tipo_contratacion_hraes = document.getElementById('id_cat_tipo_contratacion_hraes').value.trim();
    let id_cat_unidad_responsable = document.getElementById('id_cat_unidad_responsable').value.trim();
    let id_cat_puesto_hraes = document.getElementById('id_cat_puesto_hraes').value.trim();
    let id_cat_zonas_tabuladores_hraes = document.getElementById('id_cat_zonas_tabuladores_hraes').value.trim();
    let id_cat_niveles_hraes = document.getElementById('id_cat_niveles_hraes').value.trim();
    let num_plaza = document.getElementById('num_plaza').value.trim();
    let id_tbl_zonas_pago = document.getElementById('id_tbl_zonas_pago').value.trim();
    let fecha_ingreso_inst = document.getElementById('fecha_ingreso_inst').value.trim();
    let id_object = document.getElementById('id_object').value.trim();

    if (validarData(id_cat_plazas,'Tipo de plaza') &&
        validarData(id_cat_tipo_contratacion_hraes,'Tipo de contratación') &&
        validarData(id_cat_unidad_responsable,'Unidad responsable') &&
        validarData(id_cat_puesto_hraes,'Puesto') &&
        validarData(id_cat_zonas_tabuladores_hraes,'Zona tabuladores') &&
        validarData(id_cat_niveles_hraes,'Niveles')&&
        validarData(num_plaza,'Número de plaza') &&
        validarData(id_tbl_zonas_pago,'Zona pagadora') &&
        validarData(fecha_ingreso_inst,'Fecha de ingreso') &&
        caracteresCount('Número de plaza',8,num_plaza)
    ){
        if (id_object.length === 0){
            agregarEditarByDb();
        } else {
            validarEstatusPlaza(id_cat_plazas,id_object);
        }
    } 
}


function validarEstatusPlaza(id_cat_plazas,id_object){
    $.post("../../../../App/Controllers/Hrae/PlazasC/ValidarEstatusC.php", {
        id_cat_plazas: id_cat_plazas,
        id_object:id_object
    },
        function (data) {
            let jsonData = JSON.parse(data);
            let message = jsonData.message; 
            let bool = jsonData.bool;
        
            if (bool){
                mensajeError(message);
            } else {
                agregarEditarByDb();
            }
        }
    );
}