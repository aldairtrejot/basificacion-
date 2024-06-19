<?php

include ("conexion.php");

$nick = $_POST["nick"];
$pass = md5($_POST["password"]);

    $authnQuery = pg_query($connectionDBsPro, "SELECT * FROM users WHERE nick='$nick' AND password='$pass'");

    if ($authnQuery) {
        $row = pg_fetch_array($authnQuery);
        $id_user = $row["id_user"];
        $id_rol = $row["id_rol"];
        $nickDB = $row["nick"];
        $nombre = $row["nombre"];
        $passDB = $row["password"];
        $status = $row["status"];

        if (!authLogin($nick, $pass, $nickDB, $passDB)){
            if (strcmp($status, 'f') !== 0){
                session_start();
                $_SESSION["id_user"] = $id_user;
                $_SESSION["id_rol"] = $id_rol;
                $_SESSION["nick"] = $nickDB;
                $_SESSION["nombre"] = $nombre;
                $_SESSION["status"] = $status;
                echo 'acceso';
            } else {
                echo "Usuario deshabilitado";
            }
        } else {
            echo "Usuario o contraseña incorrectos";
        }
      } else {
        echo "Error +";
      }

      function authLogin($nick, $pass, $nickDB, $passDB){
        $passport = false;
        if (strcmp($nick, $nickDB) !== 0 && strcmp($pass, $passDB) !== 0){
            $passport = true;
        }
        return $passport;
      }


