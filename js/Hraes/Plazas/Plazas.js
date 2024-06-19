var id_tbl_centro_trabajo_hraes = document.getElementById("id_tbl_centro_trabajo_hraes").value;
var mensajeSalida = 'Se produjo un error al ejecutar la acción';

$(document).ready(function () {
    buscarPlaza();
    buscarInfoCentroTrabajo();
});

function buscarPlaza(){ //BUSQUEDA
    let buscarNew = clearElement(buscar);
    let buscarlenth = lengthValue(buscarNew);
    
    if (buscarlenth == 0){
        iniciarPlazas(id_tbl_centro_trabajo_hraes,null, iniciarBusqueda())
    } else {
        iniciarPlazas(id_tbl_centro_trabajo_hraes,buscarNew, iniciarBusqueda())
    }
}

function iniciarPlazas(id_tbl_centro_trabajo_hraes,busqueda, paginador){
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Plazas/tabla.php',
        data: { 
            busqueda: busqueda,
            paginador:paginador, 
            id_tbl_centro_trabajo_hraes:id_tbl_centro_trabajo_hraes
        },
        success: function (data) {
            $('#tabla_plazas').html(data);
        }
    });
}

function agregarEditarDetalles(id_object) { //SE OBTIENEN INFO DE ID SELECCIONADO
    let checkbox = document.getElementById("id_cat_situacion_plaza_hraes");
    let checkbox_disabled = document.getElementById("checkbox_disabled");

    $("#id_object").val(id_object);
    let titulo = document.getElementById("titulo_plazas");
    titulo.textContent = 'Modificar';    

    if (id_object == null){
        $("#agregar_editar_modal").find("input,textarea,select").val("");
        titulo.textContent = 'Agregar';  
    }
    $.post("../../../../App/Controllers/Hrae/PlazasC/DetallesC.php", {
        id_object: id_object,
    },
        function (data) {
            let jsonData = JSON.parse(data);//se obtiene el json
            let entity = jsonData.entity; //Se agrega a emtidad 
            let plazas = jsonData.plazas;
            let contratacion = jsonData.contratacion;
            let unidadResp = jsonData.unidadResp;
            let puesto = jsonData.puesto;
            let tabulares = jsonData.tabulares;
            let niveles = jsonData.niveles;
            let pago = jsonData.pago;
            
            $('#id_cat_plazas').empty();
            $('#id_cat_plazas').html(plazas); 
            $('#id_tbl_zonas_pago').empty();
            $('#id_tbl_zonas_pago').html(pago);
            $('#id_cat_tipo_contratacion_hraes').empty();
            $('#id_cat_tipo_contratacion_hraes').html(contratacion);
            $('#id_cat_unidad_responsable').empty();
            $('#id_cat_unidad_responsable').html(unidadResp);
            $('#id_cat_puesto_hraes').empty();
            $('#id_cat_puesto_hraes').html(puesto);
            $('#id_cat_zonas_tabuladores_hraes').empty();
            $('#id_cat_zonas_tabuladores_hraes').html(tabulares);
            $('#id_cat_niveles_hraes').empty();
            $('#id_cat_niveles_hraes').html(niveles);
            
            $("#num_plaza").val(entity.num_plaza);
            $("#fecha_ingreso_inst").val(entity.fecha_ingreso_inst);
            $("#fecha_inicio_movimiento").val(entity.fecha_inicio_movimiento);
            $("#fecha_termino_movimiento").val(entity.fecha_termino_movimiento);
            $("#fecha_modificacion").val(entity.fecha_modificacion);
            $("#id_tbl_centro_trabajo_hraes_aux").val(entity.id_tbl_centro_trabajo_hraes);

            let bool = entity.id_cat_situacion_plaza_hraes != 1 ? true : false;
            checkbox.checked = bool;
            checkbox_disabled.disabled  = !bool;
        }
    );

    $("#agregar_editar_modal").modal("show");
}

function agregarEditarByDb() {
    let id_cat_situacion_plaza_hraes = document.getElementById("id_cat_situacion_plaza_hraes");
    let id_cat_situacion_plaza_hraes_x = id_cat_situacion_plaza_hraes.checked ? 0 : 1;

    let id_tbl_centro_trabajo_hraes_aux = $("#id_tbl_centro_trabajo_hraes_aux").val();
    let id_object = $("#id_object").val();

    if (id_tbl_centro_trabajo_hraes == null){
        id_tbl_centro_trabajo_hraes_aux = id_tbl_centro_trabajo_hraes;
    }

    if(id_object == ''){
        id_tbl_centro_trabajo_hraes_aux = id_tbl_centro_trabajo_hraes;
    }

    let id_cat_plazas = $("#id_cat_plazas").val();
    let id_cat_tipo_contratacion_hraes = $("#id_cat_tipo_contratacion_hraes").val();
    let id_cat_unidad_responsable = $("#id_cat_unidad_responsable").val();
    let id_cat_puesto_hraes = $("#id_cat_puesto_hraes").val();
    let id_cat_zonas_tabuladores_hraes = $("#id_cat_zonas_tabuladores_hraes").val();
    let id_cat_niveles_hraes = $("#id_cat_niveles_hraes").val();
    let num_plaza = $("#num_plaza").val();
    let fecha_ingreso_inst = $("#fecha_ingreso_inst").val();
    let fecha_inicio_movimiento = $("#fecha_inicio_movimiento").val();
    let fecha_termino_movimiento = $("#fecha_termino_movimiento").val();
    let fecha_modificacion = $("#fecha_modificacion").val();
    let id_tbl_zonas_pago = $("#id_tbl_zonas_pago").val();

    $.post("../../../../App/Controllers/Hrae/PlazasC/AgregarEditarC.php", {
        id_cat_plazas: id_cat_plazas,
        id_cat_tipo_contratacion_hraes: id_cat_tipo_contratacion_hraes,
        id_cat_unidad_responsable:id_cat_unidad_responsable,
        id_cat_puesto_hraes:id_cat_puesto_hraes,
        id_cat_zonas_tabuladores_hraes:id_cat_zonas_tabuladores_hraes,
        id_cat_niveles_hraes:id_cat_niveles_hraes,
        num_plaza:num_plaza,
        fecha_ingreso_inst:fecha_ingreso_inst,
        fecha_inicio_movimiento:fecha_inicio_movimiento,
        fecha_termino_movimiento:fecha_termino_movimiento,
        fecha_modificacion:fecha_modificacion,
        id_object:id_object,
        id_tbl_centro_trabajo_hraes:id_tbl_centro_trabajo_hraes_aux,
        id_tbl_zonas_pago:id_tbl_zonas_pago,
        id_cat_situacion_plaza_hraes: id_cat_situacion_plaza_hraes_x
    },
        function (data) {
            if (data == 'edit'){
                mensajeExito('Plaza modificada con éxito');
            } else if (data == 'add') {
                mensajeExito('Plaza agregada con éxito');  
            } else {
                mensajeError(mensajeSalida);
            }
            $("#agregar_editar_modal").modal("hide");
            buscarPlaza();
        }
    );
}

function ocultarModal(){
    $("#agregar_editar_modal").modal("hide");
}

function ocultarModalDetalles(){
    $("#mostar_detalles_modal").modal("hide");
}

function eliminarEntity(id_object) {
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
        $.post("../../../../App/Controllers/Hrae/PlazasC/EliminarC.php", {
                id_object: id_object
            },
            function (data) {
                if (data == 'delete'){
                    mensajeExito('Plaza eliminada con éxito');
                } else {
                    messageErrorLarge('La eliminación de una plaza no debe estar sujeta a dependencias de empleados, o datos complementarios');
                }
                buscarPlaza();
            }
        );
    }
    });
}


function buscarInfoCentroTrabajo(){
    if(id_tbl_centro_trabajo_hraes != null){
        let clvResult = document.getElementById("clvResult");
        let nombreResult = document.getElementById("nombreResult");
        let cpResult = document.getElementById("cpResult");

        $.post("../../../../App/Controllers/Hrae/PlazasC/InfoCentroC.php", {
            id_tbl_centro_trabajo_hraes: id_tbl_centro_trabajo_hraes,
        },
            function (data) {
                let jsonData = JSON.parse(data);//se obtiene el json

                clvResult.textContent = jsonData.clave;
                nombreResult.textContent = jsonData.nombre;
                cpResult.textContent = jsonData.codigo_postal;
            }
        );
    }
}

/*
function detallesEntity(id_tbl_control_plazas_hraes){

    let num_plaza_dt = document.getElementById("num_plaza_dt");
    let cve_centro_trabajo_dt = document.getElementById("cve_centro_trabajo_dt");
    let tipo_plaza_dt = document.getElementById("tipo_plaza_dt");
    let codigo_postal_dt = document.getElementById("codigo_postal_dt");
    let entidad_dt = document.getElementById("entidad_dt");
    let unidad_respo_dt = document.getElementById("unidad_respo_dt");
    let nombre_centro_trabajo_dt = document.getElementById("nombre_centro_trabajo_dt");

    let curp_dt = document.getElementById("curp_dt");
    let rfc_dt = document.getElementById("rfc_dt");
    let nombre_dt = document.getElementById("nombre_dt");


    $.post("../../../../App/Controllers/Hrae/PlazasC/DetallesEntityC.php", {
        id_tbl_control_plazas_hraes: id_tbl_control_plazas_hraes,
    },
        function (data) {
            let jsonData = JSON.parse(data);//se obtiene el json
            let entity = jsonData.entity;
            let empleado = jsonData.empleado;

            num_plaza_dt.textContent = entity[1];
            cve_centro_trabajo_dt.textContent = entity[5];
            tipo_plaza_dt.textContent = entity[2];
            entidad_dt.textContent = entity[7];
            codigo_postal_dt.textContent = entity[8];
            unidad_respo_dt.textContent = entity[3];
            nombre_centro_trabajo_dt.textContent = entity[6];

          
            curp_dt.textContent = concatNombre(empleado['curp'],'','');
            rfc_dt.textContent = concatNombre(empleado['rfc'],'','');
            nombre_dt.textContent = concatNombre(empleado['nombre'],empleado['primer_apellido'],empleado['segundo_apellido']);

            $("#mostar_detalles_modal").modal("show");
            listarTablaHistori(id_tbl_control_plazas_hraes);
        }
    );
}
*/
function detallesPlazaModal(id_tbl_control_plazas_hraes){
    $.post("../../../../App/Controllers/Hrae/PlazasC/DetallesEntityC.php", {
        id_tbl_control_plazas_hraes: id_tbl_control_plazas_hraes,
    },
        function (data) {
            let jsonData = JSON.parse(data);//se obtiene el json
            let entity = jsonData.entity;
            let empleado = jsonData.empleado;

            $("#espe_clabe").val(entity[5]);
            $("#espe_entidad").val(entity[7]);
            $("#espe_codigo_postal").val(entity[8]);
            $("#espe_unidad_rep").val(entity[3]);
            $("#espe_codigo_postal").val(entity[8]);
            $("#espe_nombre").val(entity[6]);

            listarTablaHistori(id_tbl_control_plazas_hraes);
            $("#modal_detallas_plazas").modal("show");
        }
    );
}

function detallesPlazaModalOcultar(){
    $("#modal_detallas_plazas").modal("hide");
}



function listarTablaHistori(id_tbl_control_plazas_hraes){
    $.post("../../../../App/View/Hraes/Plazas/tablaHistoria.php", {
        id_tbl_control_plazas_hraes: id_tbl_control_plazas_hraes,
    },
        function (data) {
            $('#tabla_historia_plaza_empleado_ix').html(data);
        }
    );
}

function concatNombre(nombre, primerApellido, segundoApellido){
    if (nombre != null){
        return  nombre + ' ' + primerApellido + ' ' + segundoApellido;
    } else {
        return 'Sin registro.';
    }
}


function validarNumero(input) {
    input.value = input.value.replace(/[^\d]/g, '');
  }