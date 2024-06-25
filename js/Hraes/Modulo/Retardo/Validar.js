var idDocumentos = 2;

function validarDependiente(){
    let fecha_retardo = document.getElementById('fecha').value;
    let hora_entrada = document.getElementById('hora').value;
    let cat_asistencia_bas = document.getElementById('cat_asistencia_bas').value;
    let cat_estatus_bas = document.getElementById('cat_estatus_bas').value;
    let observaciones_bas = document.getElementById('observaciones_bas').value;
    let id_object = document.getElementById('id_object').value;

    if (id_object == ''){///Agregar
            if(validarData(cat_asistencia_bas,'Seleccione el tipo')){
                if (cat_asistencia_bas == idDocumentos){
                    if (validarData(cat_estatus_bas,'Seleccione el estatus')){
                        guardarRetardo();
                    }
                } else {
                    guardarRetardo();
                }
         } 
    } else { ///MODIFICAR
       if(validarAccion()){
        if(validarData(fecha_retardo,'Fecha') &&
            validarData(hora_entrada,'Hora') &&
            validarData(cat_asistencia_bas,'Seleccione el tipo')){
            if (cat_asistencia_bas == idDocumentos){
                if (validarData(cat_estatus_bas,'Seleccione el estatus')){
                    guardarRetardo();
                }
            } else {
                guardarRetardo();
            }
     } 
    }
    }
}


var selectElement = document.getElementById('cat_asistencia_bas');
        selectElement.addEventListener('change', function() {
        if (selectElement.value == idDocumentos){
            mostrarContenido('ocultar_estatus');
        } else {
            ocultarContenido('ocultar_estatus');
        }
    });
