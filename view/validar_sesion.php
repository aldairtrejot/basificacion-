<?php
    
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if (isset($_SESSION['id_user']) && isset($_SESSION['nombre']) && isset($_SESSION['nick']) && isset($_SESSION['status']) && isset($_SESSION['id_rol'])){

}else {
    header('Location: ../../authentication-login.php');
}
