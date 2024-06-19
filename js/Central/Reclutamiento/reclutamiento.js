$(document).ready(function () {
    iniciarTabla();
});


function iniciarTabla() { ///INGRESA LA TABLA
    $.get("../../../../App/View/Central/reclutamiento/tabla.php", {}, function (data, status) {
        $("#t-table").html(data);
    });
}

function agregarEditarDetalles(id_object) { //SE OBTIENEN INFO DE ID SELECCIONADO
    $("#id_object").val(id_object);
    if (id_object == null){
        $("#agregar_editar_modal").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Central/ReclutamientoC/DetallesC.php", {
        id_object: id_object
    },
        function (data, status) {
            var entity = JSON.parse(data);
            $("#nombre").val(entity.nombre);
            $("#rfc").val(entity.rfc);
            $("#primer_apellido").val(entity.primer_apellido);
            $("#curp").val(entity.curp);
            $("#segundo_apellido").val(entity.segundo_apellido);
            $("#nss").val(entity.nss);
        }
    );

    $("#agregar_editar_modal").modal("show");
}


function agregarEditarByDb() {
    var nombre = $("#nombre").val();
    var rfc = $("#rfc").val();
    var primer_apellido = $("#primer_apellido").val();
    var curp = $("#curp").val();
    var segundo_apellido = $("#segundo_apellido").val();
    var nss = $("#nss").val();
    var id_object = $("#id_object").val();

    $.post("../../../../App/Controllers/Central/ReclutamientoC/AgregarEditarC.php", {
        id_object: id_object,
        nombre: nombre,
        rfc:rfc,
        primer_apellido:primer_apellido,
        curp:curp,
        segundo_apellido:segundo_apellido,
        nss:nss,
    },
        function (data, status) {
            if (data == 'edit'){
                mensanjeExito('Modificado con éxito');
            } else if (data == 'add') {
                mensanjeExito('Agregado con éxito');  
            } else {
                mensanjeError(data);
            }
            $("#agregar_editar_modal").modal("hide");
            iniciarTabla();
        }
    );
}


function eliminarEntity(id_object) {//ELIMINAR USUARIO
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
        $.post("../../../../App/Controllers/Central/ReclutamientoC/EliminarC.php", {
            id_object: id_object
            },
            function (data, status) {
                if (data == 'delete'){
                    mensanjeExito('Eliminado con éxito')
                } else {
                    mensanjeError(data);
                }
                iniciarTabla();
            }
        );
    }
    });
}

function iniciarBusqueda(busqueda) { //BUSQUEDA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View//Central/Reclutamiento/tabla.php',
        data: { busqueda: busqueda },
        success: function (data) {
            $('#t-table').html(data);
        }
    });
}

function buscarInBd(){ //BUSQUEDA
    let buscar = document.getElementById("buscar").value.trim();
    buscar = buscar.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
    buscarlenth = buscar.length;
    
    if (buscarlenth == 0){
        iniciarTabla();
    } else {
        iniciarBusqueda(buscar);
    }
}

