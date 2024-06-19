<?php 
include '../../../conexion.php';

$condicion = [
    'id_usuarios_pk' => $_POST['id_usuario_pk']
];

if (isset($_POST['id_usuario_pk'])){
    $pgs_delete = pg_delete($connectionDBsPro,'usuarios',$condicion);
    if ($pgs_delete){
        echo 'delete';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
