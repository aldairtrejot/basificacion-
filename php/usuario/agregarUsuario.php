<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$nick = $_POST['nickA']; //Se obtiene el valor de nick
$nombre = $_POST['nombreA']; //Se obtiene el valor de nombre
$password = md5($_POST['pwA']); //Se obtiene el valor de password
$rol = $_POST['rolA']; //Se obtiene el valor de rol
$status = 't'; //Se inicializa el estatus en true
$tbl_name = 'users'; //Nombre de la tabla a insertar
$nick = mb_convert_case($nick, MB_CASE_UPPER, "UTF-8"); //Convierte a mayusculas en nick


//Se ejecuta la funcion insert SQL, para agregar usuarios
$res = pg_insert($connectionDBsPro, $tbl_name, array(
    'nick' => $nick,
    'nombre' => $nombre,   
    'password' => $password,
    'status' => $status,
    'id_rol' => $rol
));

if ($res) {
    header("Location: ../../view/usuario/usuario.php"); //Regreso a la tabla
} else {
    header("Location: error.php"); //Muestra error
}
