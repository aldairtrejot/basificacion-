<?php

class ModelCamposPersM{

    public function selectCountById($id_object){
        $listado = pg_query("SELECT COUNT (*)
                             FROM ctrl_campos_pers_hraes
                             WHERE id_tbl_empleados_hraes = $id_object;");
        return $listado;
    }
    public function listarByIdEdit($id_object){
        $listado = pg_query("SELECT *
                            FROM ctrl_campos_pers_hraes
                            WHERE id_tbl_empleados_hraes = $id_object
                            ORDER BY id_ctrl_campos_pers_hraes DESC
                            LIMIT 6");
        return $listado;
    }

    public function listarByNull(){
        return $array = [
            'id_ctrl_campos_pers_hraes' => null,
            'id_tbl_empleados_hraes' => null,
            'porcentaje_ahorro_s' => null,
            'dias_medio_sueldo' => null,
            'dias_sin_sueldo' => null,
            'reintegro_faltas_retardos' => null,
            'porcentaje_svi' => null,
            'importe_festivo' => null,
            'importe_horas_ex' => null,
            'importe_prima_dominical' => null,
            'importe_descuentos_indebidos' => null,
            'importe_recuperacion_pagos_indebidos' => null,
            'dias_sansion_adma' => null,
            'regimen_pen' => null,
            'quinquenio' => null,
            'num_hijos' => null,
            'num_dias_jornada_dominical' => null,
            'num_dias_guardia_festiva' => null,
            'aplicar_juguetes' => null,
            'apoyo_titulacion' => null,
            'licencia_manejo' => null,
        ];
    }

    function editarByArray($conexion, $datos, $condicion){
        $pg_update = pg_update($conexion, 'ctrl_campos_pers_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos){
        $pg_add = pg_insert($conexion, 'ctrl_campos_pers_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion){
        $pgs_delete = pg_delete($conexion,'ctrl_campos_pers_hraes',$condicion);
        return $pgs_delete;
    }

}
