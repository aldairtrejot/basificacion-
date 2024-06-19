function validarTelefono(){
    let movil = document.getElementById('movil').value.trim();
    let id_cat_estatus = document.getElementById('id_cat_estatus').value.trim();
    let telefono = document.getElementById('telefono').value.trim();
    let id_object = document.getElementById('id_object').value.trim();


    if (validarData(movil,'Número telefónico') &&
        validarData(id_cat_estatus,'Estatus') &&
        caracteresCount('Número telefónico',10,movil) &&
        caracteresCount('Teléfono fijo',10,telefono)
    ){
        validarEstatusTelefono(id_object, id_cat_estatus);
    }
}

function validarEstatusTelefono(id_object, id_cat_estatus) { 
    $.post('../../../../App/Controllers/Hrae/TelefonoC/ValidarEstatusC.php', {
        id_object: id_object, 
        id_cat_estatus: id_cat_estatus,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            jsonData = JSON.parse(data);
            let bool = jsonData.bool;
            let message = jsonData.message;

            if(bool){
                agregarEditarByDbByTelefono();
            } else {
                mensajeError(message);
            }
        }
    );
}

function caracteresCount(text, number,value){
    let bool = true;
    if(value.length > number){
        bool = false
        mensajeError(text + ' debe tener hasta un máximo de ' + number + ' caracteres')
    } 
    return bool;
}

function esEntero(text,num) {
    let bool = true;
    if (num.includes('.')){
        bool = false;
        mensajeError(text + ' debe tener números enteros')
    }
    return bool;
}