<?php
include('../../validar_sesion.php');
include('../../conexion.php');

$id_user = base64_decode($_GET['D-F']);
$tbl_name = 'users';

if (isset($id_user)){
    $res = pg_delete($connectionDBsPro, $tbl_name, array(
        'id_user' => $id_user
    )
    );
    if ($res) {
        header("Location: ../../view/usuario/usuario.php"); //Regreso a la tabla
    } else {
        header("Location:error.php".$res);
    }
}




