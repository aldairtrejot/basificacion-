<?php

include('../../validar_sesion.php');
include('../../conexion.php');
// 0.- Variables auxiliares
//0.1.- Hace la consulta para la tabla de rol del sistema  
    $roEx = pg_query("SELECT * FROM rol");
