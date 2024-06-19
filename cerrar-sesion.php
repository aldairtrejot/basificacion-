<?php
    session_start();

    unset($_SESSION['id_user']);
    unset($_SESSION['nombre']);
    unset($_SESSION['nick']);
    unset($_SESSION['status']);
    unset($_SESSION['id_rol']);

    session_destroy();

    header(("location: authentication-login.php"));

?>