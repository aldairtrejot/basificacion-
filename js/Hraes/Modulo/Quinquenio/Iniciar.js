var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;

function buscarQuinquenio(){
    iniciarTabla_qu(id_tbl_empleados_hraes);
}

function iniciarTabla_qu(id_tbl_empleados_hraes) { 
    $.post('../../../../App/View/Hraes/Modulo/Quinquenio/tabla.php', {
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            $("#tabla_quinquenio").html(data); 
        }
    );
}

function agregarEditarQuinquenio(id_object){
    $("#id_object").val(id_object);
    let titulo = document.getElementById("titulo_quinquenio");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null){
        titulo.textContent = 'Agregar';
        $("#agregar_editar_quinquenio").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/QuinquenioC/DetallesC.php", {
        id_object: id_object,
    },
        function (data) {
            let jsonData = JSON.parse(data);
            let entity = jsonData.response; 
            let quinquenio = jsonData.quinquenio; 

            $('#id_cat_quinquenio').empty();
            $('#id_cat_quinquenio').html(quinquenio);  
            $("#fecha_registro").val(entity.fecha_registro);

        }
    );

    $("#agregar_editar_quinquenio").modal("show");
}

function salirAgregarEditarQuinquenio(){
    $("#agregar_editar_quinquenio").modal("hide");
}

function agregarEditarByDbByQuinquenio() {

    $.post("../../../../App/Controllers/Hrae/QuinquenioC/AgregarEditarC.php", {
        id_object: $("#id_object").val(),
        id_cat_quinquenio: $("#id_cat_quinquenio").val(),
        //fecha_registro: $("#fecha_registro").val(),
        id_tbl_empleados_hraes:id_tbl_empleados_hraes,
    },
        function (data) {
            if (data == 'edit'){
                mensajeExito('Quinquenio modificado con éxito');
            } else if (data == 'add') {
                mensajeExito('Quinquenio agregado con éxito');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_quinquenio").modal("hide");
            buscarQuinquenio();
        }
    );
}

function eliminarQuinquenio(id_object) {
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
        $.post("../../../../App/Controllers/Hrae/QuinquenioC/EliminarC.php", {
                id_object: id_object
            },
            function (data) {
                if (data == 'delete'){
                    mensajeExito('Quinquenio eliminado con éxito')
                } else {
                    mensajeError(data);
                }
                buscarQuinquenio();
            }
        );
    }
    });
}

