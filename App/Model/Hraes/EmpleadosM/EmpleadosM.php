<?php

class modelEmpleadosHraes
{

    public function validarCurp($value, $id_object)
    {
        $result = "";
        if ($id_object != '') {
            $result = "AND id_tbl_empleados_hraes != $id_object;";
        }
        $listado = pg_query("SELECT COUNT(id_tbl_empleados_hraes)
                             FROM tbl_empleados_hraes
                             WHERE curp = '$value' " . $result);
        return $listado;
    }

    public function validarRfc($value, $id_object)
    {
        $result = "";
        if ($id_object != '') {
            $result = "AND id_tbl_empleados_hraes != $id_object;";
        }
        $listado = pg_query("SELECT COUNT(id_tbl_empleados_hraes)
                             FROM tbl_empleados_hraes
                             WHERE rfc = '$value' " . $result);
        return $listado;
    }

    public function validarNoEmpleado($value, $id_object)
    {
        $result = "";
        if ($id_object != '') {
            $result = "AND id_tbl_empleados_hraes != $id_object;";
        }
        $listado = pg_query("SELECT COUNT(id_tbl_empleados_hraes)
                             FROM tbl_empleados_hraes
                             WHERE num_empleado = '$value' " . $result);
        return $listado;
    }

    public function listarByAll($paginador)
    {
        $listado = "SELECT id_tbl_empleados_hraes, rfc, curp, nombre, primer_apellido,
                           segundo_apellido, num_empleado
                    FROM tbl_empleados_hraes
                    ORDER BY id_tbl_empleados_hraes DESC
                    LIMIT 6 OFFSET $paginador;";

        return $listado;
    }

    public function listarByLike($busqueda, $paginador)
    {
        $listado = "SELECT id_tbl_empleados_hraes, rfc, curp, nombre, primer_apellido,
                           segundo_apellido,num_empleado
                    FROM tbl_empleados_hraes
                    WHERE TRIM(UPPER(UNACCENT(rfc))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(curp))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(nombre))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(primer_apellido))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(segundo_apellido))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(CAST(num_empleado AS TEXT)))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(CONCAT(nombre,' ',primer_apellido,' ',segundo_apellido))))
                        LIKE '%$busqueda%'
                    ORDER BY id_tbl_empleados_hraes DESC
                    LIMIT 6 OFFSET $paginador;";
        return $listado;
    }

    public function listarByIdEdit($id_object)
    {
        $listado = pg_query("SELECT *
                            FROM tbl_empleados_hraes
                            WHERE id_tbl_empleados_hraes = $id_object
                            ORDER BY id_tbl_empleados_hraes DESC
                            LIMIT 6");
        return $listado;
    }

    public function listarByNull()
    {
        return $array = [
            'id_tbl_empleados_hraes' => null,
            'rfc' => null,
            'curp' => null,
            'nombre' => null,
            'primer_apellido' => null,
            'segundo_apellido' => null,
            'nss' => null,
            'num_empleado' => null,
            'nacionalidad' => null,
            'id_cat_estado_civil' => null,
            'id_cat_genero' => null,
            'id_cat_pais_nacimiento' => null,
            'id_cat_estado_nacimiento' => null,
        ];
    }

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'tbl_empleados_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'tbl_empleados_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'tbl_empleados_hraes', $condicion);
        return $pgs_delete;
    }

    function empleadosCountAll()
    {
        $listado = pg_query("SELECT COUNT (id_tbl_empleados_hraes)
                             FROM tbl_empleados_hraes;");
        return $listado;
    }

    function generoEmpleados($condition)
    {
        $listado = pg_query("SELECT COUNT(id_tbl_empleados_hraes)
                             FROM tbl_empleados_hraes
                             WHERE SUBSTRING(curp,11,1) = '$condition';");
        return $listado;
    }

    public function numEmpleado($idEmpleado)
    {
        $listado = pg_query("SELECT split_part(num_empleado, '-', 1)
                             FROM tbl_empleados_hraes
                             WHERE id_tbl_empleados_hraes = $idEmpleado");

        return $listado;
    }


    ///REPORTE PARA GENERARLO
    public function updateFomope($name)
    {
        $query = pg_query("UPDATE $name
                            SET observaciones = 'NO REGISTRADO EN SISTEMA'
                            WHERE CLABE IS NULL AND CODIGO_POSTAL_FISCAL IS NULL;

                            UPDATE $name
                            SET observaciones = 'NO CUENTA CON CODIGO POSTAL'
                            where (LENGTH(codigo_postal) is null 
                            or LENGTH(codigo_postal_fiscal) is null
                            ) and trim(observaciones) not in ('NO REGISTRADO EN SISTEMA');

                            UPDATE $name
                            SET observaciones = 'NO CUENTA CON CUENTA CLABE'
                            where LENGTH(CLABE) is null 
                            AND  trim(observaciones) not in ('NO REGISTRADO EN SISTEMA');
                            
                            UPDATE $name
                            SET observaciones = 'PROCESO DE VALIDACION DE DATOS'
                            where trim(observaciones) = '';
                            ");
        return $query;
    }


    public function truncateFomope($name)
    {
        $query = pg_query("TRUNCATE TABLE $name;");
        return $query;
    }

    public function fomopeQueryAll($name)
    {
        $query = pg_query("insert into bi_fomope_edomex 
SELECT 
A.id_tbl_empleados_hraes AS no_,
                B.fecha_expedicion AS fecha_expedicion,
                UPPER(A.primer_apellido) AS apellido_paterno,UPPER(A.segundo_apellido) AS apellido_materno,                UPPER(A.nombre) AS nombre,
                UPPER(A.rfc) AS rfc,  UPPER(A.curp) AS curp,
                UPPER(C.calle1) AS calle,         UPPER(C.num_exterior1) AS num_exterior,    UPPER(C.num_interior1) AS num_interior,
                UPPER(C.colonia1) AS colonia,CAST(C.codigo_postal1 as TEXT) AS codigo_postal, CAST(C.codigo_postal2 as TEXT) AS codigo_postal_fiscal,     
                UPPER(C.municipio1) AS alcaldia_municipio,               UPPER(C.entidad1) AS estado,
                CAST(G.telefono as TEXT) AS telefono_fijo,      CAST(G.movil as TEXT ) AS celular,       H.correo_electronico AS correo,
                CAST(I.clabe as TEXT) AS clabe,             UPPER(J.nombre) AS banco_cuenta_clabe,
                SUBSTRING(A.curp,11,1) AS genero,   UPPER(K.estado_civil) as estado_civil,
                CONCAT(           CASE WHEN SUBSTRING (A.curp,5,2) > '24' THEN 
                                               CONCAT('19',SUBSTRING(A.curp,5,2)) 
                                               ELSE CONCAT('20',SUBSTRING(A.curp,5,2))  END
                ,'/',           SUBSTRING (A.curp,7,2)            ,'/',           SUBSTRING (A.curp,9,2)            ) AS fecha_nacimiento,
                UPPER(LL.nombre) AS estado_nacimiento,    DATE_PART('year', AGE(NOW(),    
                TO_DATE(      CONCAT(CASE WHEN SUBSTRING(A.curp, 5, 2) > '24' THEN 
                         CONCAT('19', SUBSTRING(A.curp, 5, 2)) 
                      ELSE CONCAT('20', SUBSTRING(A.curp, 5, 2)) 
                         END,
                      '/', SUBSTRING(A.curp, 7, 2), '/',  SUBSTRING(A.curp, 9, 2)
            ), 'YYYY/MM/DD' )  )) AS edad,
                B.fecha_ingreso_gob_fed AS fecha_ingreso_gobierno_fed,
                B.vigencia_al AS fecha_ingreso_imss_bienestar,
                N.codigo_puesto AS codigo_puesto, O.codigo AS nivel,
                N.nombre_posicion AS nombre_puesto,
                EE.especialidad AS especialidaad,
                CAST(DD.cedula AS TEXT) AS cedula_esp,
                UPPER(BB.nivel_estudios) AS carrera,
                CC.carrera AS descripcion, 
                CAST(AA.cedula as TEXT) AS cedula_prof,
                CAST(A.nss as TEXT) AS nss,
                CONCAT(Q.tipo_contratacion, 
                               R.subtipo) AS tipo_contratacion, 
                'NUEVO INGRESO' AS status,
                GG.descripcion_lengua AS lengua_idioma,
                JJ.capacidad AS capacidad,
                'REGULARIZACION EDOMEX' AS origen_candidato, 
                '' as observaciones
                
FROM  tbl_empleados_hraes A LEFT JOIN ctrl_adic_emp_hraes B ON A.id_tbl_empleados_hraes = B.id_tbl_empleados_hraes
LEFT JOIN tbl_domicilios_hraes C  ON C.id_tbl_empleados_hraes =A.id_tbl_empleados_hraes
LEFT JOIN ctrl_asistencia_bas D           ON D.id_tbl_empleados_hraes =          A.id_tbl_empleados_hraes
LEFT JOIN cat_asistencia_bas E            ON D.id_cat_asistencia_bas = E.id_cat_asistencia_bas
LEFT JOIN cat_estatus_bas F  ON D.id_cat_estatus_bas = F.id_cat_estatus_bas
LEFT JOIN ctrl_telefono_hraes G           ON G.id_tbl_empleados_hraes = A.id_tbl_empleados_hraes
LEFT JOIN ctrl_medios_contacto_hraes H ON H.id_tbl_empleados_hraes = A.id_tbl_empleados_hraes
LEFT JOIN ctrl_cuenta_clabe_hraes I ON I.id_tbl_empleados_hraes = A.id_tbl_empleados_hraes
LEFT JOIN cat_banco J ON I.id_cat_banco = J.id_cat_banco
LEFT JOIN cat_estado_civil K  ON K.id_cat_estado_civil = A.id_cat_estado_civil
LEFT JOIN tbl_plazas_empleados_hraes L       ON         L.id_tbl_empleados_hraes = A.id_tbl_empleados_hraes
LEFT JOIN tbl_control_plazas_hraes M              ON M.id_tbl_control_plazas_hraes =L.id_tbl_control_plazas_hraes
LEFT JOIN cat_puesto_hraes   N ON M.id_cat_puesto_hraes =N.id_cat_puesto_hraes
LEFT JOIN cat_niveles_hraes O              ON M.id_cat_niveles_hraes =O.id_cat_niveles_hraes
LEFT JOIN cat_tipo_subtipo_contratacion_hraes P     ON         M.id_cat_tipo_subtipo_contratacion_hraes =P.id_cat_tipo_subtipo_contratacion_hraes
LEFT JOIN cat_tipo_contratacion_hraes Q       ON P.id_cat_tipo_contratacion_hraes =Q.id_cat_tipo_contratacion_hraes
LEFT JOIN cat_subtipo_contratacion_hraes R ON P.id_cat_subtipo_contratacion_hraes =R.id_cat_subtipo_contratacion_hraes
LEFT JOIN ctrl_estudios_hraes AA ON AA.id_tbl_empleados_hraes = A.id_tbl_empleados_hraes
LEFT JOIN cat_nivel_estudios BB  ON AA.id_cat_nivel_estudios =BB.id_cat_nivel_estudios
LEFT JOIN cat_carrera_hraes CC          ON AA.id_cat_carrera_hraes =CC.id_cat_carrera_hraes
LEFT JOIN ctrl_especialidad_hraes DD              ON DD.id_tbl_empleados_hraes = A.id_tbl_empleados_hraes
LEFT JOIN cat_especialidad_hraes EE ON DD.id_cat_especialidad_hraes =EE.id_cat_especialidad_hraes
LEFT JOIN ctrl_lengua_idioma FF         ON FF.id_tbl_empleados_hraes = A.id_tbl_empleados_hraes
LEFT JOIN lengua GG   ON FF.id_cat_lengua_idioma = GG.id
LEFT JOIN ctrl_capacidad_dif_hraes HH          ON HH.id_tbl_empleados_hraes = A.id_tbl_empleados_hraes
LEFT JOIN cat_capacidad_dif_hraes JJ               ON HH.id_cat_capacidad_dif_hraes =JJ.id_capacidad_dif_hraes
LEFT JOIN cat_pais_nacimiento KK      ON KK.id_cat_pais_nacimiento =A.id_cat_pais_nacimiento
LEFT JOIN cat_estado_nacimiento LL ON LL.id_cat_estado_nacimiento =A.id_cat_estado_nacimiento
WHERE (D.id_ctrl_asistencia_bas = 
                (SELECT MAX(CA.id_ctrl_asistencia_bas) 
                 FROM ctrl_asistencia_bas CA  WHERE CA.id_tbl_empleados_hraes  = A.id_tbl_empleados_hraes)
                  OR D.id_ctrl_asistencia_bas IS NULL)                
AND (G.id_ctrl_telefono_hraes = 
                (SELECT MAX(XX.id_ctrl_telefono_hraes) 
                 FROM ctrl_telefono_hraes XX  WHERE XX.id_tbl_empleados_hraes 
                                = A.id_tbl_empleados_hraes)
                  OR G.id_ctrl_telefono_hraes IS NULL)                
AND (H.id_ctrl_medios_contacto_hraes = 
                (SELECT MAX(CM.id_ctrl_medios_contacto_hraes) 
                 FROM ctrl_medios_contacto_hraes CM
                WHERE CM.id_tbl_empleados_hraes 
                                = A.id_tbl_empleados_hraes)
                  OR H.id_ctrl_medios_contacto_hraes IS NULL)
AND (I.id_ctrl_cuenta_clabe_hraes = 
                (SELECT MAX(CB.id_ctrl_cuenta_clabe_hraes) 
                 FROM ctrl_cuenta_clabe_hraes CB
                WHERE CB.id_tbl_empleados_hraes = A.id_tbl_empleados_hraes)
                  OR I.id_ctrl_cuenta_clabe_hraes IS NULL)       
AND (AA.id_ctrl_estudios_hraes = 
                (SELECT MAX(CE.id_ctrl_estudios_hraes) 
                 FROM ctrl_estudios_hraes CE
                WHERE CE.id_tbl_empleados_hraes = A.id_tbl_empleados_hraes)
                  OR AA.id_ctrl_estudios_hraes IS NULL)           
AND (DD.id_ctrl_especialidad_hraes = 
                (SELECT MAX(CES.id_ctrl_especialidad_hraes) 
                 FROM ctrl_especialidad_hraes CES
                WHERE CES.id_tbl_empleados_hraes = A.id_tbl_empleados_hraes)
                  OR DD.id_ctrl_especialidad_hraes IS NULL)
AND (FF.id_ctrl_lengua_idioma = 
                (SELECT MAX(CID.id_ctrl_lengua_idioma) 
                 FROM ctrl_lengua_idioma CID
                WHERE CID.id_tbl_empleados_hraes  = A.id_tbl_empleados_hraes)
                  OR FF.id_ctrl_lengua_idioma IS NULL)
AND (HH.id_ctrl_capacidad_dif_hraes = 
                (SELECT MAX(CCA.id_ctrl_capacidad_dif_hraes) 
                 FROM ctrl_capacidad_dif_hraes CCA
                WHERE CCA.id_tbl_empleados_hraes  = A.id_tbl_empleados_hraes)
                  OR HH.id_ctrl_capacidad_dif_hraes IS NULL)
ORDER BY A.id_tbl_empleados_hraes ASC;");
        return $query;
    }




}
