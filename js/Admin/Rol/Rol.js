$(document).ready(function () {
    iniciarTablaRol();
});


function iniciarTablaRol() { ///INGRESA LA TABLA
    $.get("../../../../App/View/Admin/Rol/tabla.php", {}, function (data, status) {
        $("#t-table").html(data);
    });
}

function iniciarBusquedaRol(busqueda) { //BUSQUEDA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Admin/Rol/tabla.php',
        data: { busqueda: busqueda },
        success: function (data) {
            $('#t-table').html(data);
        }
    });
}

function buscarRol(){ //BUSQUEDA
    let buscar = document.getElementById("buscarRol").value.trim();
    buscar = buscar.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
    buscarlenth = buscar.length;
    
    if (buscarlenth == 0){
        iniciarTablaRol();
    } else {
        iniciarBusquedaRol(buscar);
    }
}

