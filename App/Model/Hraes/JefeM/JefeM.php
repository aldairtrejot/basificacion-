<?php

class ModelJefeM
{
    function listarById($id_object, $paginator)
    {
        $listado = pg_query("SELECT 
                                ctrl_lengua_idioma.id_ctrl_lengua_idioma,
                                CONCAT(cat_lengua_idioma.codigo, ' - ', cat_lengua_idioma.descripcion)
                            FROM ctrl_lengua_idioma
                            INNER JOIN cat_lengua_idioma
                            ON ctrl_lengua_idioma.id_cat_lengua_idioma =
                                cat_lengua_idioma.id_cat_lengua_idioma
                            WHERE ctrl_lengua_idioma.id_tbl_empleados_hraes = $id_object
                            ORDER BY ctrl_lengua_idioma.id_ctrl_lengua_idioma DESC
                            LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function listarByBusqueda($id_object, $busqueda,$paginator)
    {
        $listado = pg_query("SELECT 
                                ctrl_lengua_idioma.id_ctrl_lengua_idioma,
                                CONCAT(cat_lengua_idioma.codigo, ' - ', cat_lengua_idioma.descripcion)
                            FROM ctrl_lengua_idioma
                            INNER JOIN cat_lengua_idioma
                            ON ctrl_lengua_idioma.id_cat_lengua_idioma =
                                cat_lengua_idioma.id_cat_lengua_idioma
                            WHERE ctrl_lengua_idioma.id_tbl_empleados_hraes = $id_object
                             AND TRIM(UPPER(UNACCENT(CONCAT(cat_lengua_idioma.codigo, ' - ', cat_lengua_idioma.descripcion))))
                                 LIKE '%$busqueda%'
                             ORDER BY ctrl_lengua_idioma.id_ctrl_lengua_idioma DESC 
                             LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function listarByIdCedula($id_object)
    {
        $listado = pg_query("SELECT *
                            FROM ctrl_lengua_idioma
                            WHERE id_ctrl_lengua_idioma = $id_object");
        return $listado;
    }

    function listarByNull()
    {
        return $raw = [
            'id_ctrl_lengua_idioma' => null,
            'id_cat_lengua_idioma' => null,
            'id_tbl_empleados_hraes' => null,
        ];
    }

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'ctrl_lengua_idioma', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'ctrl_lengua_idioma', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'ctrl_lengua_idioma', $condicion);
        return $pgs_delete;
    }

    public function listadoIdiomas(){
        $listado = pg_query("SELECT id_cat_lengua_idioma,
                                    CONCAT (codigo, ' - ', descripcion)
                            FROM cat_lengua_idioma
                            ORDER BY codigo ASC;");
        return $listado;
    }

    public function editCatalog($id){
        $listado = pg_query("SELECT id_cat_lengua_idioma,
                                    CONCAT (codigo, ' - ', descripcion)
                            FROM cat_lengua_idioma
                            WHERE id_cat_lengua_idioma = $id");
        return $listado;
    }
}
