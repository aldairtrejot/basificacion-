var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;

function buscarCapacidadesDif(){ //BUSQUEDA
    let buscarNew = clearElement(buscar_cf);
    let buscarlenth = lengthValue(buscarNew);
    
    if (buscarlenth == 0){
        iniciarTabla_cf(null, iniciarBusqueda_cf(),id_tbl_empleados_hraes);
    } else {
        iniciarTabla_cf(buscarNew, iniciarBusqueda_cf(),id_tbl_empleados_hraes);
    }
}

function iniciarTabla_cf(busqueda, paginador, id_tbl_empleados_hraes) { 
    $.post('../../../../App/View/Hraes/Modulo/CapacidadesDif/tabla.php', {
        busqueda: busqueda, 
        paginador: paginador, 
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            $("#tabla_capacidad_dif").html(data); 
        }
    );
}

function agregarEditarCapacidad(id_object){
    $("#id_object").val(id_object);
    let titulo = document.getElementById("titulodiscapacidad");
    titulo.textContent = 'Modificar';
    if (id_object == null){
        titulo.textContent = 'Agregar';
        $("#agregar_editar_forma_pago").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/CapacidadesDifC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            var jsonData = JSON.parse(data);//se obtiene el json
            var capacidad = jsonData.capacidad; //Se agrega a emtidad 

            $('#id_cat_capacidad_dif_hraes').empty();
            $('#id_cat_capacidad_dif_hraes').html(capacidad); 
        }
    );

    $("#agregar_editar_capacidad").modal("show");
}

function salirAgregarEditarCapacidad(){
    $("#agregar_editar_capacidad").modal("hide");
}


function agregarEditarByDbByCapacidad() {
    $.post("../../../../App/Controllers/Hrae/CapacidadesDifC/AgregarEditarC.php", {
        id_object: $("#id_object").val(),
        id_cat_capacidad_dif_hraes:$("#id_cat_capacidad_dif_hraes").val(),
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            if (data == 'edit'){
                mensajeExito('Elemento modificado con éxito');
            } else if (data == 'add') {
                mensajeExito('Elemento agregado con éxito');  
            } else {
                mensajeError(mensajeSalida);
            }
            $("#agregar_editar_capacidad").modal("hide");
            buscarCapacidadesDif();
        }
    );
}


function eliminarCapacidad(id_object) {//ELIMINAR USUARIO
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
        $.post("../../../../App/Controllers/Hrae/CapacidadesDifC/EliminarC.php", {
                id_object: id_object
            },
            function (data, status) {
                if (data == 'delete'){
                    mensajeExito('Elemento eliminado con éxito')
                } else {
                    mensajeError(mensajeSalida);
                }
                buscarCapacidadesDif();
            }
        );
    }
    });
}

/*
document.addEventListener('DOMContentLoaded', function () {
    tippy('#agregar_forma_pago', {
        content: 'Agregar forma de pago.',
        theme: 'green',
    });
});
*/