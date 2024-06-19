<?php include("../validar_rol.php") ?>
<?php

include("../../conexion.php");
include("../../php/usuario/listarUsuario.php");

$id_user = base64_decode($_GET['id_user']);

echo $id_user;