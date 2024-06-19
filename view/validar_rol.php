<?php
    /*
    Permite validar si el usuario cuenta con el rol de administrador, si el 
    usuario no cuenta con el rol de admin, lo retorna a la pantalla de login
    cerrando su sesion, si cuenta con el rol de admin, el usuario continua con
    con su navegacion normal.
    */
    include("../../validar_sesion.php");
    if ($_SESSION['id_rol'] != 1){
        unset($_SESSION['id_rol']);
        unset($_SESSION['id_user']);
        unset($_SESSION['nick']);
        unset($_SESSION['nombre']);

        session_destroy();
        header(("location: ../../cerrar-sesion.php"));
    }
?>