<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye el metodo de conexion para las consultas

$id_usuario = $_POST["id_user"]; //Se obtiene el valor de id_user
$nick = $_POST["nickN"];  // Se obtiene el valor de nick
$nombre = $_POST["nombreN"]; //Se obtiene el valor de nombre
$pw = $_POST["pwN"]; //Se obtiene el valor de password
$rol = $_POST["rolN"]; //Se obtiene el valor de rol
$tbl_name = 'users'; //Nombre de la tabla a insertar
$ms = true; //La variable manda el msj

//El array trae los atributos modificables en caso de que la pw este vacia
$arrayUpdate = array('nick' => $nick, 'nombre' => $nombre, 'id_rol' => $rol);

//El array trae la condicion
$arrayCondition = array('id_user' => $id_usuario);

if ($pw != "") { //Condicion, la pw trae informacion
    $pw = MD5($pw); //Encriptado de pw
    //El array trae los atributos modificables en caso de que la pw lleve info
    $arrayUpdate = array('nick' => $nick, 'nombre' => $nombre, 'id_rol' => $rol, 'password' => $pw);
    $res = pg_update($connectionDBsPro, $tbl_name, $arrayUpdate, $arrayCondition);
    if ($res) {
        header("Location: ../../view/usuario/usuario.php"); //Regreso a la tabla
    } else {
        header("Location: error.php"); //Muestra error
    }

} else { // Condicion, la pw esta vacia
    $res = pg_update($connectionDBsPro, $tbl_name, $arrayUpdate, $arrayCondition);
    if ($res) {
        header("Location: ../../view/usuario/usuario.php"); //Regreso a la tabla
    } else {
        header("Location: error.php"); //Muestra error
    }
}
