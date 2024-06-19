<?php
include '../../../conexion.php';
include '../../Model/Usuarios/UsuariosM.php';

$modelUsuario = new modelUsuario();

$id_usuarios_pk = $_POST['id_usuario_pk'];

if ($id_usuarios_pk != null) {

    $query = $modelUsuario->listarUsuarioByIdEdit($id_usuarios_pk);
    if (!$result = pg_query($connectionDBsPro, $query)) {
        exit(pg_pg_result_error($connectionDBsPro));
    }
    $response = array();
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_assoc($result)) {
            $response = $row;
        }
    }
    echo json_encode($response);
} else {
    $response = $modelUsuario->listarUsuarioIsNull();
    echo json_encode($array);
}