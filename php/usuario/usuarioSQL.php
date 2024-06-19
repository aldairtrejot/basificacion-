<?php

include('../../validar_sesion.php');
include('../../conexion.php');

$authnQueryUser = pg_query($connectionDBsPro, "SELECT * FROM users");
$rowl = array();
while ($valores = pg_fetch_array($authnQueryUser)) {
    $rowl[] = $valores["nick"];
}
$json = json_encode($rowl);
