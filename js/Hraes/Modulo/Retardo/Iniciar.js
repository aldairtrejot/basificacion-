var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;


/*
campoFecha.addEventListener("change", function() {
    let fecha = campoFecha.value;
    iniciarTabla_re(fecha, iniciarBusqueda_re(),id_tbl_empleados_hraes);
});
*/

function buscarRetardo(){ //BUSQUEDA
    let buscarNew = clearElement(buscar_re);
    let buscarlenth = lengthValue(buscarNew);
    if (buscarlenth == 0){
        iniciarTabla_re(null, iniciarBusqueda_re(),id_tbl_empleados_hraes);
    } else {
        iniciarTabla_re(buscarNew, iniciarBusqueda_re(),id_tbl_empleados_hraes);
    }
}

function iniciarTabla_re(busqueda, paginador, id_tbl_empleados_hraes) { 
    $.post('../../../../App/View/Hraes/Modulo/Retardo/tabla.php', {
        busqueda: busqueda, 
        paginador: paginador, 
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            $("#tabla_retardo").html(data); 
        }
    );
}

function agregarEditarRetardo(id_object){
    $("#id_object").val(id_object);
    let titulo = document.getElementById("titulo_retardo");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null){
        titulo.textContent = 'Agregar';
        $("#agregar_editar_retardo").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/RetardoC/DetallesC.php", {
        id_object: id_object
    },
        function (data) { 
            var jsonData = JSON.parse(data);
            var entity = jsonData.response;  
            var catalogo = jsonData.catalogo;
            var estatus = jsonData.estatus;

            $('#cat_asistencia_bas').empty();
            $('#cat_asistencia_bas').html(catalogo);

            $('#cat_estatus_bas').empty();
            $('#cat_estatus_bas').html(estatus);
            

            $('#observaciones_bas').val(entity.observaciones);

            ///ocultar hora
            if (id_object == null){
                ocultarContenido('ocultar_hora');
                ocultarContenido('ocultar_estatus');
                //$("#fecha").val(entity.fecha);
                //$("#hora").val(convertirTiempoPostgreSQL(entity.hora));
            } else {
                $("#fecha").val(entity.fecha);
                $("#hora").val(convertirTiempoPostgreSQL(entity.hora));
                
                mostrarContenido('ocultar_hora');
                mostrarContenido('ocultar_estatus');
            }
        }
    );

    $("#agregar_editar_retardo").modal("show");
}

function salirAgregarEditarRetardo(){
    $("#agregar_editar_retardo").modal("hide");
}

function convertirTiempoPostgreSQL(tiempo) {
    // Dividir el tiempo en horas, minutos y segundos
    let partes = tiempo.split(':');

    // Extraer horas y minutos
    let horas = partes[0];
    let minutos = partes[1];

    // Devolver como objeto con horas y minutos
    return horas + ':' + minutos;
}

function guardarRetardo() {
    //if(validarAccion()){
    let fecha = $("#fecha").val();
    let hora = $("#hora").val();
    console.log(hora);
    let cat_asistencia_bas = $("#cat_asistencia_bas").val();
    let cat_estatus_bas = $("#cat_estatus_bas").val();
    let observaciones_bas = $("#observaciones_bas").val();
    let id_object = $("#id_object").val();

    $.post("../../../../App/Controllers/Hrae/RetardoC/AgregarEditarC.php", {
        id_object: id_object,
        hora: hora,
        fecha:fecha,
        cat_asistencia_bas:cat_asistencia_bas,
        cat_estatus_bas:cat_estatus_bas,
        observaciones:observaciones_bas,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes,
    },
        function (data) {
            if (data == 'edit'){
                mensajeExito('Asistencia modificada con éxito');
            } else if (data == 'add') {
                mensajeExito('Asistencia agregada con éxito'); 
                mensajetextLar("Usuario valida que el domicilio esté correctamente ingresado, que se hayan añadido el nivel de estudios, la forma de pago y los medios de contacto de forma correcta."); 
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_retardo").modal("hide");
            buscarRetardo();
        }
    );
//}
}

function mensajetextLar(text){
    Swal.fire({
        title: "USUARIO",
        text: text,
        icon: "warning"
      });
}


function eliminarRetardo(id_object) {//ELIMINAR USUARIO
    //if(validarAccion()){
    Swal.fire({
        title: "¿Está seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {
        $.post("../../../../App/Controllers/Hrae/RetardoC/EliminarC.php", {
                id_object: id_object
            },
            function (data) {
                if (data == 'delete'){
                    mensajeExito('Retardo eliminado con éxito')
                } else {
                    mensajeError(data);
                }
                buscarRetardo();
            }
        );
    }
    });
//}
}

function concatHora(hora,minuto){
    let horaFinal = "";
    if (hora != null){
        horaFinal = addCero(hora) + ':' + addCero(minuto);
    }
    return horaFinal;
}

function addCero(time){
    if (time < 10){
        time = '0' + time;
    }
    return time;
}
/*
function iniciarRetardo(){
    iniciarTablaRetardo(id_tbl_empleados_hraes);
}

function iniciarTablaRetardo(id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/Retardo/tabla.php',
        data: { id_tbl_empleados_hraes: id_tbl_empleados_hraes },
        success: function (data) {
            $('#tabla_retardo').html(data);
        }
    });
}




campoFecha.addEventListener("change", function() {
    let fecha = campoFecha.value;
    iniciarTabla(fecha, id_tbl_empleados_hraes)
});

function iniciarTabla(buscar, id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/Retardo/tabla.php',
        data: { 
            buscar: buscar,
            id_tbl_empleados_hraes: id_tbl_empleados_hraes,
         },
        success: function (data) {
            console.log(data);
            $('#tabla_retardo').html(data);
        }
    });
}



*/


function asitenciaEmpleado(){
    Swal.fire({
        title: "¿Confirmar registro de asistencia?",
        text: "",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Confirmar",
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {
        $.post("../../../../App/Controllers/Hrae/EmpleadoC/AsistenciaC.php", {
                id_object: id_tbl_empleados_hraes
            },
            function (data) {
                if (data == 'success'){
                    mensajeExito('Asistencia registrada con éxito')
                } else {
                    mensajeError(mensajeSalida);
                }
                buscarRetardo();
            }
        );
    }
    });
  }