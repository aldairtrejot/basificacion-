<?php
class CatMovimientoM
{
    public function listarByAllGeneral()
    {
        $listado = pg_query("SELECT DISTINCT(tipo_movimiento),tipo_movimiento, 
                                    id_tipo_movimiento
                             FROM tbl_movimientos
                             ORDER BY tipo_movimiento ASC");
        return $listado;
    }

    public function listarByIdGeneral($id){
        $listado = pg_query("SELECT id_tipo_movimiento,tipo_movimiento
                            FROM tbl_movimientos
                            WHERE id_tbl_movimientos = $id
                            ORDER BY tipo_movimiento ASC");
        return $listado;
    }

    public function obtenerByAllEspecifico($idObject)
    {
        $listado = pg_query("SELECT CONCAT(codigo, ' - ', nombre_movimiento),id_tbl_movimientos
                             FROM tbl_movimientos
                             WHERE id_tipo_movimiento = $idObject;");
        return $listado;
    }

    public function obtenerByIdEspecifico($id){
        $listado = pg_query("SELECT CONCAT(codigo, ' - ',nombre_movimiento),id_tbl_movimientos
                             FROM tbl_movimientos
                             WHERE id_tbl_movimientos = $id;");
        return $listado;
    }

    public function listadoIdMovimiento($id){
        $listado = pg_query("SELECT DISTINCT(id_tipo_movimiento)
                             FROM tbl_movimientos
                             WHERE id_tbl_movimientos = $id;");
        return $listado;
    }
}
