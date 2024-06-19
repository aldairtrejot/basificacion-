var valorInicial = 1;
var textValor = document.getElementById('idUsertable');
var buscar = document.getElementById("buscarUsuario");
//var buscar = document.getElementById("buscarUsuario").value.trim();


function siguienteValor(){
    valorInicial++;
    textValor.textContent = valorInicial;
    buscarUsuario();
}

function anteriorValor(){
    valorInicial--;
    if(valorInicial < 1){
        valorInicial = 1;
    }
    textValor.textContent = valorInicial;
    buscarUsuario();
}

function iniciarBusqueda(){
    let valorInicialAux = valorInicial;
    valorInicialAux --;
    let valoroff = valorInicialAux * 5;
    return valoroff;
}

///INCIO DOCUMENTO
$(document).ready(function () {///INICIAR TABLA DE USUARIOS
    buscarUsuario();
});

function iniciarTabla(busqueda, paginador) { ///INGRESA LA TABLA USUARIOS PARAMETROS 'BUSQUEDA' Y 'PAGINADOR'
    $.post('../../../../App/View/Admin/Usuarios/tabla.php', {
        busqueda: busqueda, //DATOS INGRESADOS PARAMETROS
        paginador: paginador, //DATOS INGRESADOS PARAMETROS
    },
        function (data) {
            $("#tabla_usuarios").html(data); ///RESULTADO PARA TABLA
        }
    );
} 

function agregarEditarUsuarios(id_object) { //SE OBTIENEN INFO DE ID SELECCIONADO
    let titulo = document.getElementById("titulo_usuario");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null){
        $("#agregar_editar_usuario").find("input,textarea,select").val("");
        titulo.textContent = 'Agregar';
    }

    $.post("../../../../App/Controllers/Admin/UsuariosC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            var jsonData = JSON.parse(data);//se obtiene el json
            var entity = jsonData.response; 
            var rol = jsonData.rol;

            //Catalogos
            $('#id_rol').empty();
            $('#id_rol').html(rol); 

            $("#password").val("");
            $("#passwordConfirm").val("");

            $("#nick").val(entity.nick);
            $("#nombre").val(entity.nombre);
        }
    );

    $("#agregar_editar_usuario").modal("show");
}



function guardarUsuario() {
    var nick = $("#nick").val();
    var nombre = $("#nombre").val();
    var password = $("#password").val();
    var id_rol = $("#id_rol").val();
    var id_object = $("#id_object").val();

    $.post("../../../../App/Controllers/Admin/UsuariosC/AgregarEditarC.php", {
        id_object: id_object,
        nick: nick,
        nombre:nombre,
        id_rol:id_rol,
        password:password
    },
        function (data) {
            console.log(data);
            if (data == 'edit'){
                mensajeExito('Usuario modificado con éxito');
            } else if (data == 'add') {
                mensajeExito('Usuario agregado con éxito');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_usuario").modal("hide");
            buscarUsuario();
        }
    );
}

function ocultarModal(){
    $("#agregar_editar_usuario").modal("hide");
}

function eliminarUsuario(id_object) {//ELIMINAR USUARIO
    if(validarAccion()){
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
        $.post("../../../../App/Controllers/Admin/UsuariosC/EliminarC.php", {
                id_object: id_object
            },
            function (data) {
                if (data == 'delete'){
                    mensajeExito('Usuario eliminado con éxito');
                } else {
                    mensajeError(data);
                }
                buscarUsuario();
            }
        );
    }
    });
}
}


function iniciarBusquedaUsuarios(busqueda) { //BUSQUEDA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Admin/Usuarios/tabla.php',
        data: { busqueda: busqueda },
        success: function (data) {
            $('#t-table').html(data);
        }
    });
}

function buscarUsuario(){ //BUSQUEDA
    let buscarNew = clearElement(buscar);
    let buscarlenth = lengthValue(buscarNew);
    
    if (buscarlenth == 0){
        iniciarTabla(null, iniciarBusqueda());
    } else {
        iniciarTabla(buscarNew, iniciarBusqueda());
    }
}

///LA FUNCION RETORNA EL VALOR SIN ACENTOS, ESPACIOS EN BLANCA O CARACTERES ESPECIALES
function clearElement(value){
    return value.value.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
}

///LA FUNCION RETORNA EL TOTAL DE CARACTERES DEL VALOR
function lengthValue(value){
    return value.length;
}


