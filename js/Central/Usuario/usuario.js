$(document).ready(function () {
    iniciarTabla();
});

function iniciarTabla() { ///INGRESA LA TABLA
    $.get("../../../App/View/usuario/tabla.php", {}, function (data, status) {
        $("#t-usuarios").html(data);
    });
}

function agregarEditarUsuario() {
    var nombre = $("#nombre").val();
    var edad = $("#edad").val();
    var fecha_nacimiento = $("#fecha_nacimiento").val();
    var id_usuario_pk = $("#id_usuario_pk").val();

    $.post("../../Controllers/UsuarioC/AgregarEditarUsuarioC.php", {
        id_usuario_pk: id_usuario_pk,
        nombre: nombre,
        fecha_nacimiento:fecha_nacimiento,
        edad:edad
    },
        function (data, status) {
            if (data == 'edit'){
                mensanjeExito('Usuario modificado exitosamente');
            } else if (data == 'add') {
                mensanjeExito('Usuario agregado exitosamente');  
            } else {
                mensanjeError('No fue posible modificar / agregar el usuario');
            }
            $("#update_user_modal").modal("hide");
            iniciarTabla();
        }
    );
}


function agregarEditarDetalles(id_usuario_pk) { //SE OBTIENEN INFO DE ID SELECCIONADO
    $("#id_usuario_pk").val(id_usuario_pk);
    if (id_usuario_pk == null){
        $("#update_user_modal").find("input,textarea,select").val("");
    }

    $.post("../../../App/Controllers/UsuarioC/EditarUsuarioC.php", {
        id_usuario_pk: id_usuario_pk
    },
        function (data, status) {
            var usuario = JSON.parse(data);
            $("#nombre").val(usuario.nombre);
            $("#edad").val(usuario.edad);
            $("#fecha_nacimiento").val(usuario.fecha_nacimiento);
        }
    );

    $("#update_user_modal").modal("show");
}

function eliminarUsuario(id_usuario_pk) {//ELIMINAR USUARIO
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
        $.post("../../../App/Controllers/UsuarioC/EliminarUsuarioC.php", {
                id_usuario_pk: id_usuario_pk
            },
            function (data, status) {
                if (data == 'delete'){
                    mensanjeExito('Usuario eliminado exitosamente')
                } else {
                    mensanjeError('No fue posible eliminar el usuario');
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
        url: '../../../App/View/usuario/tabla.php',
        data: { busqueda: busqueda },
        success: function (data) {
            $('#t-usuarios').html(data);
        }
    });
}

function buscarUsuario(){ //BUSQUEDA
    let buscar = document.getElementById("buscar").value.trim();
    buscar = buscar.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
    buscarlenth = buscar.length;
    
    if (buscarlenth == 0){
        iniciarTabla();
    } else {
        iniciarBusqueda(buscar);
    }
}
