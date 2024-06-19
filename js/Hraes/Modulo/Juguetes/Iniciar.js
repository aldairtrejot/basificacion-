var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;

function buscarJuguete(){ //BUSQUEDA
    let buscarNew = clearElement(buscar_ju);
    let buscarlenth = lengthValue(buscarNew);
    
    if (buscarlenth == 0){
        iniciarTabla_ju(null, iniciarBusqueda_ju(),id_tbl_empleados_hraes);
    } else {
        iniciarTabla_ju(buscarNew, iniciarBusqueda_ju(),id_tbl_empleados_hraes);
    }
}

function iniciarTabla_ju(busqueda, paginador, id_tbl_empleados_hraes) { 
    $.post('../../../../App/View/Hraes/Modulo/Juguetes/tabla.php', {
        busqueda: busqueda, 
        paginador: paginador, 
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            $("#tabla_jueguetes").html(data); 
        }
    );
}



function agregarEditarJuguete(id_object){
    $("#id_object").val(id_object);
    let titulo = document.getElementById("titulo_juguete");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null){
        titulo.textContent = 'Agregar';
        $("#agregar_editar_juguete").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/JuguetesC/DetallesC.php", {
        id_object: id_object,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            var jsonData = JSON.parse(data);
            var entity = jsonData.response; 
            var dependiente = jsonData.dependiente;
            var fecha = jsonData.fecha;  
            var estatus = jsonData.estatus;
            var value = jsonData.value;

            $('#id_ctrl_dependientes_economicos_j').empty();
            $('#id_ctrl_dependientes_economicos_j').html(dependiente); 
            $('#id_cat_fecha_juguetes_j').empty();
            $('#id_cat_fecha_juguetes_j').html(fecha); 
            $('#id_cat_estatus_juguetes_j').empty();
            $('#id_cat_estatus_juguetes_j').html(estatus); 
            $('#curp_j').val(value.curp);
        }
    );

    $("#agregar_editar_juguete").modal("show");
}

function salirAgregarEditarJuguete(){
    $("#agregar_editar_juguete").modal("hide");
}


function agregarEditarByDbByJuguete() {
    let id_ctrl_dependientes_economicos_hraes = $("#id_ctrl_dependientes_economicos_j").val();
    let id_cat_fecha_juguetes = $("#id_cat_fecha_juguetes_j").val();
    let id_cat_estatus_juguetes = $("#id_cat_estatus_juguetes_j").val();
    let id_object = $("#id_object").val();

    $.post("../../../../App/Controllers/Hrae/JuguetesC/AgregarEditarC.php", {
        id_object: id_object,
        id_ctrl_dependientes_economicos_hraes: id_ctrl_dependientes_economicos_hraes,
        id_cat_fecha_juguetes:id_cat_fecha_juguetes,
        id_cat_estatus_juguetes:id_cat_estatus_juguetes,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            if (data == 'edit'){
                mensajeExito('Dependiente modificado en módulo de juguetes');
            } else if (data == 'add') {
                mensajeExito('Dependiente agregado al módulo de juguetes');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_juguete").modal("hide");
            buscarJuguete();
        }
    );
}


function eliminarJuguete(id_object) {
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
        $.post("../../../../App/Controllers/Hrae/JuguetesC/EliminarC.php", {
                id_object: id_object
            },
            function (data) {
                if (data == 'delete'){
                    mensajeExito('Dependiente eliminado del módulo de juguetes')
                } else {
                    mensajeError(data);
                }
                buscarJuguete();
            }
        );
    }
    });
}
/*
function iniciarJueguetes(){
    iniciarTablaJuguetes(id_tbl_empleados_hraes);
}

function iniciarTablaJuguetes(id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/Juguetes/tabla.php',
        data: { id_tbl_empleados_hraes: id_tbl_empleados_hraes },
        success: function (data) {
            $('#tabla_jueguetes').html(data);
        }
    });
}


function agregarEditarJuguete(id_object){
    $("#id_object").val(id_object);
    let titulo = document.getElementById("titulo_juguete");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null){
        titulo.textContent = 'Agregar';
        $("#agregar_editar_juguete").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/JuguetesC/DetallesC.php", {
        id_object: id_object,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            var jsonData = JSON.parse(data);
            var entity = jsonData.response; 
            var dependiente = jsonData.dependiente;
            var fecha = jsonData.fecha;  
            var estatus = jsonData.estatus;
            var value = jsonData.value;

            $('#id_ctrl_dependientes_economicos_j').empty();
            $('#id_ctrl_dependientes_economicos_j').html(dependiente); 
            $('#id_cat_fecha_juguetes_j').empty();
            $('#id_cat_fecha_juguetes_j').html(fecha); 
            $('#id_cat_estatus_juguetes_j').empty();
            $('#id_cat_estatus_juguetes_j').html(estatus); 
            $('#curp_j').val(value.curp);
        }
    );

    $("#agregar_editar_juguete").modal("show");
}

function salirAgregarEditarJuguete(){
    $("#agregar_editar_juguete").modal("hide");
}


function agregarEditarByDbByJuguete() {
    let id_ctrl_dependientes_economicos_hraes = $("#id_ctrl_dependientes_economicos_j").val();
    let id_cat_fecha_juguetes = $("#id_cat_fecha_juguetes_j").val();
    let id_cat_estatus_juguetes = $("#id_cat_estatus_juguetes_j").val();
    let id_object = $("#id_object").val();

    $.post("../../../../App/Controllers/Hrae/JuguetesC/AgregarEditarC.php", {
        id_object: id_object,
        id_ctrl_dependientes_economicos_hraes: id_ctrl_dependientes_economicos_hraes,
        id_cat_fecha_juguetes:id_cat_fecha_juguetes,
        id_cat_estatus_juguetes:id_cat_estatus_juguetes,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            if (data == 'edit'){
                mensajeExito('Dependiente modificado en módulo de juguetes');
            } else if (data == 'add') {
                mensajeExito('Dependiente agregado al módulo de juguetes');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_juguete").modal("hide");
            iniciarJueguetes();
        }
    );
}


function eliminarJuguete(id_object) {
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
        $.post("../../../../App/Controllers/Hrae/JuguetesC/EliminarC.php", {
                id_object: id_object
            },
            function (data) {
                if (data == 'delete'){
                    mensajeExito('Dependiente eliminado del módulo de juguetes')
                } else {
                    mensajeError(data);
                }
                iniciarJueguetes();
            }
        );
    }
    });
}


function buscarJuguete(){ //BUSQUEDA
    let buscar = document.getElementById("buscarJuguete").value.trim();
    buscar = buscar.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
    buscarlenth = buscar.length;
    
    if (buscarlenth == 0){
        iniciarJueguetes();
    } else {
        iniciarTablaCedulaByJuguete(buscar,id_tbl_empleados_hraes);
    }
}


function iniciarTablaCedulaByJuguete(buscar, id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/Juguetes/tabla.php',
        data: { 
            buscar: buscar,
            id_tbl_empleados_hraes: id_tbl_empleados_hraes,
         },
        success: function (data) {
            $('#tabla_jueguetes').html(data);
        }
    });
}
*/