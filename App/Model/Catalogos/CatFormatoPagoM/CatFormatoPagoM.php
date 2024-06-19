<?php
class CatFormatoPagoM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_formato_pago, forma_pago
                             FROM cat_formato_pago
                             ORDER BY forma_pago ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_formato_pago, forma_pago
                             FROM cat_formato_pago
                             WHERE id_cat_formato_pago = $idObject");
        return $listado;
    }
}
