var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;

function buscarEspecialidad(){ //BUSQUEDA
    let buscarNew = clearElement(buscar_es);
    let buscarlenth = lengthValue(buscarNew);
    
    if (buscarlenth == 0){
        iniciarTabla_es(null, iniciarBusqueda_es(),id_tbl_empleados_hraes);
    } else {
        iniciarTabla_es(buscarNew, iniciarBusqueda_es(),id_tbl_empleados_hraes);
    }
}

function iniciarTabla_es(busqueda, paginador, id_tbl_empleados_hraes) { 
    $.post('../../../../App/View/Hraes/Modulo/Especialidad/tabla.php', {
        busqueda: busqueda, 
        paginador: paginador, 
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            $("#tabla_especialidad").html(data); 
        }
    );
}

function agregarEditarEspecialidad(id_object){
    $("#id_object").val(id_object);
    let titulo = document.getElementById("tituloEspecialidad");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null){
        titulo.textContent = 'Agregar';
        $("#agregar_editar_especialidad").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/EspecialidadC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            var jsonData = JSON.parse(data);
            var especialidad = jsonData.especialidad; 

            $('#id_cat_especialidad_hraes').empty();
            $('#id_cat_especialidad_hraes').html(especialidad); 
        }
    );

    $("#agregar_editar_especialidad").modal("show");
}

function salirAgregarEditarEspecialidad(){
    $("#agregar_editar_especialidad").modal("hide");
}


function guardarCedula() {
    $.post("../../../../App/Controllers/Hrae/EspecialidadC/AgregarEditarC.php", {
        id_object: $("#id_object").val(),
        id_cat_especialidad_hraes: $("#id_cat_especialidad_hraes").val(),
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            if (data == 'edit'){
                mensajeExito('Especialidad modificada con éxito');
            } else if (data == 'add') {
                mensajeExito('Especialidad agregada con éxito');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_especialidad").modal("hide");
            buscarEspecialidad();
        }
    );
}

function eliminarEspecialidad(id_object) {//ELIMINAR USUARIO
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
        $.post("../../../../App/Controllers/Hrae/EspecialidadC/EliminarC.php", {
                id_object: id_object
            },
            function (data) {
                if (data == 'delete'){
                    mensajeExito('Especialidad eliminada con éxito')
                } else {
                    mensajeError(data);
                }
                buscarEspecialidad();
            }
        );
    }
    });
}
