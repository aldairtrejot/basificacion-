<?php

class CatZonasPagoM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT DISTINCT (codigo),id_tbl_zonas_pago_hares
                             FROM tbl_zonas_pago_hraes
                             ORDER BY codigo ASC");
        return $listado;
    }

    public function ListarElemetoById($idObject)
    {
        $listado = pg_query("SELECT DISTINCT (codigo),id_tbl_zonas_pago_hares
                             FROM tbl_zonas_pago_hraes
                             WHERE id_tbl_zonas_pago_hares = $idObject");
        return $listado;
    }
}
