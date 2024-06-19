<?php
include('../../validar_sesion.php');
include('../../conexion.php');
// 0.- Variables auxiliares
//0.1.- Hace la consulta para la tabla de usuarios del sistema  
    $usEx = pg_query($connectionDBsPro, "SELECT * FROM users");
    $roEx = pg_query("SELECT * FROM rol");
    
//2.- FUNCIONES
//2.1- La funcion retorna el nombre del rol, espera como parametro el id_rol de usuarios
function rolFunction($idRol){
    $rolEx = pg_query("SELECT * FROM rol WHERE id_rol = '$idRol' ");
    $row = pg_fetch_array($rolEx);
    $nombreRol = $row["nombre"];
    return $nombreRol;
}

//La funcion retorna el valor activo o inactivo, espera como parametro el valor boolean de usuar
function statusFunction($statusF){
    $statusR = "Deshabilitado";
    if (strcmp($statusF, 'f') !== 0){
        $statusR = "Activo";
    };
    return $statusR;
}

function listarUsuarioByNick($id_user){
    $listar = pg_query("SELECT id_user, nick
                       FROM users 
                       WHERE id_user = $id_user ");
    $row = pg_fetch_array($listar);
    return $row['nick'];
}
