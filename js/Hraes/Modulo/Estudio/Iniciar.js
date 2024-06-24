var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;

function buscarEstudio(){ //BUSQUEDA
    let buscarNew = clearElement(buscar_ne);
    let buscarlenth = lengthValue(buscarNew);
    
    if (buscarlenth == 0){
        iniciarTabla_ne(null, iniciarBusqueda_ne(),id_tbl_empleados_hraes);
    } else {
        iniciarTabla_ne(buscarNew, iniciarBusqueda_ne(),id_tbl_empleados_hraes);
    }
}

function iniciarTabla_ne(busqueda, paginador, id_tbl_empleados_hraes) { 
    $.post('../../../../App/View/Hraes/Modulo/Estudio/tabla.php', {
        busqueda: busqueda, 
        paginador: paginador, 
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            $("#tabla_estudio").html(data); 
        }
    );
}

function agregarEditarEstudio(id_object){
    $("#id_object").val(id_object);
    let titulo = document.getElementById("tituloEstudio");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null){
        titulo.textContent = 'Agregar';
        $("#agregar_editar_estudio").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/EstudioC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            var jsonData = JSON.parse(data);
            var estudio = jsonData.estudio; 

            var carrera = jsonData.carrera;

            var cedula_ca = jsonData.cedula_ca;
            var carrera_ca = jsonData.carrera_ca;
            var estudio_id = jsonData.estudio_id;

            $('#id_cat_nivel_estudios').empty();
            $('#id_cat_nivel_estudios').html(estudio);
            $('#cedula_ca').val(cedula_ca);

            $('#id_cat_carrera_hraes').empty();
            $('#id_cat_carrera_hraes').html(carrera); 

            //$('#id_cat_nivel_estudios').selectpicker('refresh');
            //$('#id_cat_carrera_hraes').selectpicker('refresh');
            //$('.selectpicker').selectpicker();

            ocultarContenido('ocultar_carrera');
            if (estudio_id == 160){
                $('#carrera_ca').val(carrera_ca);
                mostrarContenido('ocultar_carrera');
            }
        }
    );

    $("#agregar_editar_estudio").modal("show");
}

function salirAgregarEstudio(){
    $("#agregar_editar_estudio").modal("hide");
}


function guardarEstudio() {

    let id_cat_carrera_hraes = $("#id_cat_carrera_hraes").val();
    let carrera_ca = $("#carrera_ca").val();
    if (id_cat_carrera_hraes != 160){
        carrera_ca = '';
    }


    $.post("../../../../App/Controllers/Hrae/EstudioC/AgregarEditarC.php", {
        id_object: $("#id_object").val(),
        id_cat_carrera_hraes: $("#id_cat_carrera_hraes").val(),
        id_cat_nivel_estudios: $("#id_cat_nivel_estudios").val(),
        id_tbl_empleados_hraes:id_tbl_empleados_hraes,
        carrera:carrera_ca,
        cedula: $("#cedula_ca").val(),
    },
        function (data) {
            if (data == 'edit'){
                mensajeExito('Nivel de estudio modificado con éxito');
            } else if (data == 'add') {
                mensajeExito('Nivel de estudio agregado con éxito');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_estudio").modal("hide");
            buscarEstudio();
        }
    );
}

function eliminarEstudio(id_object) {//ELIMINAR USUARIO
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
        $.post("../../../../App/Controllers/Hrae/EstudioC/EliminarC.php", {
                id_object: id_object
            },
            function (data) {
                if (data == 'delete'){
                    mensajeExito('Nivel de estudio eliminado con éxito')
                } else {
                    mensajeError(data);
                }
                buscarEstudio();
            }
        );
    }
    });
}
