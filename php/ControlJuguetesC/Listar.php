<?php
include ('../../validar_sesion.php');    //Se incluye validar_sesion
include ('../../conexion.php'); //Se incluye la conexion



function listarCtrlJuguetes($id_tbl_empleados)
{
     $listado = pg_query("SELECT id_ctrl_juguetes, id_cat_fecha_juguetes, id_cat_estatus_juguetes, 
                                 id_tbl_empleados, id_tbl_dependientes_economicos, monto
                          FROM ctrl_juguetes
                          WHERE id_tbl_empleados = $id_tbl_empleados");
     return $listado;
}

function listarCtrlJuguetesById($id_ctrl_juguetes)
{
     $listado = pg_query("SELECT id_ctrl_juguetes, id_cat_fecha_juguetes, id_cat_estatus_juguetes, 
                                 id_tbl_dependientes_economicos
                          FROM ctrl_juguetes
                          WHERE id_ctrl_juguetes = $id_ctrl_juguetes");
     $row = pg_fetch_array($listado);
     return $row;
}

function listarCtrlJuguetesByJson()
{
     $list = pg_query("SELECT id_cat_fecha_juguetes, id_tbl_dependientes_economicos,id_ctrl_juguetes
                         FROM ctrl_juguetes");
     while ($value = pg_fetch_array($list)) {
          $row[] = $value["id_cat_fecha_juguetes"];
          $row[] = $value["id_tbl_dependientes_economicos"];
          $row[] = $value["id_ctrl_juguetes"];
     }
     $json = json_encode($row);
     return $json;
}

function insertarCtrlJuguetes($id_cat_fecha_juguetes, $id_cat_estatus_juguetes, $id_tbl_empleados, $id_tbl_dependientes_economicos, $id_ctrl_carga_masiva)
{
     include ('../../conexion.php');
     $pgs_QRY = pg_insert(
          $connectionDBsPro,
          'ctrl_juguetes',
          array(
               'id_cat_fecha_juguetes' => $id_cat_fecha_juguetes,
               'id_cat_estatus_juguetes' => $id_cat_estatus_juguetes,
               'id_tbl_empleados' => $id_tbl_empleados,
               'id_tbl_dependientes_economicos' => $id_tbl_dependientes_economicos,
               'id_ctrl_carga_masiva' => $id_ctrl_carga_masiva
          )
     );
}

function juguetesByExportExel($id_cat_fecha_juguetes)
{
     $listado = pg_query("SELECT ce.entidad, pz.zona_pagadora, tc.desc_tipo_cont, em.rfc, pz.num_plaza,
								CONCAT(em.segundo_apellido,' ',em.primer_apellido,' ',em.nombre),
								cp.nombre_posicion, cp.codigo_puesto, COUNT(cj.id_tbl_empleados) 
						FROM tbl_centro_trabajo AS ctr
						INNER JOIN tbl_control_plazas AS pz
							ON pz.id_tbl_centro_trabajo = ctr.id_tbl_centro_trabajo
						INNER JOIN cat_tipo_contratacion AS tc
							ON pz.id_cat_tipo_contratacion  = tc.id_cat_tipo_contratacion
						INNER JOIN cat_puesto AS cp
							ON pz.id_cat_puesto = cp.id_cat_puesto 
						INNER JOIN tbl_plazas_empleados AS tpe
							ON pz.id_tbl_control_plazas = tpe.id_tbl_control_plazas
						INNER JOIN tbl_empleados AS em
							ON tpe.id_tbl_empleados = em.id_tbl_empleados
						INNER JOIN ctrl_juguetes AS cj
							ON cj.id_tbl_empleados = em.id_tbl_empleados
						INNER JOIN cat_entidad AS ce
							ON ctr.id_cat_entidad = ce.id_cat_entidad
						WHERE cj.id_cat_fecha_juguetes = $id_cat_fecha_juguetes 
						GROUP BY pz.zona_pagadora, tc.desc_tipo_cont, em.rfc, pz.num_plaza,
								 CONCAT(em.segundo_apellido,' ',em.primer_apellido,' ',em.nombre),
								 cp.nombre_posicion, cp.codigo_puesto,ce.entidad");
     return $listado;
}

function listadoControlJuguetesByCount($id_tbl_empleados, $id_cat_fecha_juguetes)
{
     $listado = pg_query("SELECT COUNT(ctrl_juguetes.id_tbl_empleados) FROM ctrl_juguetes
                         INNER JOIN tbl_empleados
                         ON ctrl_juguetes.id_tbl_empleados = tbl_empleados.id_tbl_empleados 
                         WHERE tbl_empleados.id_tbl_empleados = $id_tbl_empleados
                         AND ctrl_juguetes.id_cat_fecha_juguetes = $id_cat_fecha_juguetes");
     $row = pg_fetch_array($listado);
     return $row[0];
}

function updateCtrlJuguetesByEstatus($id_Cat_estatus_juguetes,$monto,$id_tbl_empleados,$id_Cat_fecha_juguetes)
{
     include ('../../conexion.php');
     pg_update($connectionDBsPro,'ctrl_juguetes', 
     $arrayUpdate = [
          "id_cat_estatus_juguetes" => $id_Cat_estatus_juguetes,
          "monto" => $monto,
      ], $arrayCondition = [
          "id_tbl_empleados" => $id_tbl_empleados,
          "id_cat_fecha_juguetes" => $id_Cat_fecha_juguetes,
      ]);
      //echo "$id_Cat_estatus_juguetes,$monto,$id_tbl_empleados,$id_Cat_fecha_juguetes";
}
