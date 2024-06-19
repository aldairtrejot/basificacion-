<?php
include ('../../conexion.php');
include ('../CatFechaJuguetesC/listar.php');
include ('../ControlCargaMasivaC/Listar.php');
include ('../ControlErrorDependientesC/Listar.php');
include ('../DependientesEconomicosC/Listar.php');
include ('../ControlJuguetesC/Listar.php');
include ('../EmpleadosC/Listar.php');
include ('../CurpC/listar.php');

function CargaDependientesJuguetes($archivo, $id_cat_fecha_juguetes_new, $id_cat_carga_masiva)
{
    $tipo_carga = $id_cat_carga_masiva;
    $id_usuario = $_SESSION['id_user'];
    $id_cat_fecha_juguetes = $id_cat_fecha_juguetes_new;
    $anio = listadoFechaJuguetesByAnio($id_cat_fecha_juguetes);
    $fechaLimit = listadoFechaJuguetesByFecha($id_cat_fecha_juguetes); ///FECHA LIMITE PARA LA ADQUISION DE PROCUTO
    $idEstatusJuguete = 1;
    $edadLimit = 12;/// EDAD LIMITE DEL MENOR
    $idTipoContratacion = 3; /// ID TIPO DE CONTRATACION
    $messageErrorEmpleado = "El empleado no cumple con los criterios para ser candidato";
    $messageErrorMenor = "El menor no cumple con los criterios para ser candidato";
    $messageErrorMenorDupli = "Ya existe un registro con la curp del menor en el modulo de juguetes";
    $messageErrorMenorCurp = "CURP invalida del menor";
    $messgeEstatusError = "Error al agregar";
    $messageErrorDatosIncompletos = "Faltan algunos campos por llenar";
    $registroExito = 0;
    $registroError = 0;

    ///Ejecutar funcion de limpieza de tabla
//trucateErrorDependienteEconomico();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
        $archivo_temporal = $_FILES["archivo"]["tmp_name"];
        $nombre_archivo = basename($_FILES["archivo"]["name"]);
        $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
        $lineas = file($archivo_temporal);
        $permitidos = array("csv");

        if (!in_array($extension, $permitidos)) {
            echo "Solo se permiten archivos CSV";
        } else {
            $i = 0;
            /// SE AGREGA LA PRIMER CARGA MASIVA
            agregarControlCargaMasivaNew($tipo_carga, $id_usuario);
            $idCtrlCargaMasiva = listarControlCargaMasivaByMax();

            //echo $idCtrlCargaMasiva;
            foreach ($lineas as $linea) {
                $cantidad_registros = count($lineas);
                $cantidad_regist_agregados = ($cantidad_registros - 4);
                $lineaExel = $i + 1;

                if ($i != 0) {
                    $datos = explode(",", $linea);

                    $rfc = !empty($datos[0]) ? trim($datos[0]) : '';
                    $curp = !empty($datos[1]) ? trim($datos[1]) : '';
                    $curpConyuge = !empty($datos[2]) ? trim($datos[2]) : '';
                    $apellidoPaterno = !empty($datos[3]) ? trim($datos[3]) : '';
                    $apellidoMaterno = !empty($datos[4]) ? trim($datos[4]) : '';
                    $nombre = !empty($datos[5]) ? trim($datos[5]) : '';



                    if (empty($rfc) || empty($curp) || empty($curpConyuge) || empty($apellidoPaterno)) {
                        //echo "No existen datos en linea $lineaExel";
                        insertarErrorDependieteEco($rfc, $curp, $curpConyuge, $nombre, $apellidoPaterno, $apellidoMaterno, $messgeEstatusError, $messageErrorDatosIncompletos, $lineaExel, $idCtrlCargaMasiva);
                        $registroError++;
                    } else {
                        //echo "Datos correctos en linea $lineaExel";




                        $idTblEmpleado = validacionEmpleado($curp, $rfc); ///id_tbl_empleado
                        $dateCurp = obtenerFechaNacimiento($curpConyuge); ///OBTENER FECHA DE NACIMIENTO
                        $edadMenor = validarFechaNecimiento($dateCurp, $fechaLimit); /// OBTENER LA FECHA DE NACIMIENTO DEL MENOR

                        if (!empty($idTblEmpleado)) { ///VALIDACION DE RFC O CURP DE EMPLEADO
                            /// LOS RFC/CURP EMPATAN CON LAS CARACTERISTICAS PARA EL REGALO

                            if (validateCurp($curpConyuge)) {///VALIDACION DE CURP
                                /// LA CURP ES VALIDA
                                if ($edadMenor < $edadLimit) { ///COMPARACION DE EDAD DE MENOR QUE SEA MENOR A 12
                                    /// LA EDAD DEL MENOR ES CORRECTA, POR LO TANTO ES CANDIDATO
                                    //echo "empleado $curp es verdadero - $idTblEmpleado - $curpConyuge- $dateCurp - $edadMenor";
                                    //echo "<br>";

                                    ///------------------------
                                    //VALIDACION QUE EL MENOR NO ESTE REGISTRADO DOS VECES EN LA TABLA
                                    $consultaCurpMenor = validacionCurpMenorExista($curpConyuge, $id_cat_fecha_juguetes);
                                    if ($consultaCurpMenor == 0) { /// VALIDA QUE LA CURP DEL MENOR NO ESTE REGISTRADA EN LA BASE DE DARTOS
                                        ///EL REGISTRO NO EXISTE ASI QUE SE AGREGA
                                        /// SE INSERTA EN LA TABLA CTRL_DEPENDIENTES_ECONOMICOS


                                        if (validaExistaCurpByCurp($curpConyuge) == 0) {///VALIDACION PARA AGREGAR O MODIFICAR LA CURP DEL MENOR
                                            ///AGREGA AL MENOR A LA TABLA TBL_DEPENDIENTE ECONOMICO
                                            //echo "$lineaExel - $curpConyuge - Agregar";
                                            insertarDependienteEconomico($curpConyuge, $nombre, $apellidoPaterno, $apellidoMaterno, $idTipoContratacion, $idTblEmpleado);
                                        } else {
                                            ///MODIFICA LA INFORMACION A TRAVEZ DE LA CURP DEL MENOR
                                            //echo "$lineaExel - $curpConyuge - Modifica";
                                            $idDependienreEconomico = idDependieEconomico($curpConyuge);
                                            modificarDependienteEconomicoByMas($idDependienreEconomico, $nombre, $apellidoPaterno, $apellidoMaterno, $idTipoContratacion, $idTblEmpleado);
                                        }


                                        $idDependienreEconomico = idDependieEconomico($curpConyuge);
                                        insertarCtrlJuguetes($id_cat_fecha_juguetes, $idEstatusJuguete, $idTblEmpleado, $idDependienreEconomico, $idCtrlCargaMasiva);
                                        $registroExito++;

                                    } else {
                                        /// EL REGISTRO YA EXISTE, SE MANDA EL ERROR
                                        //insertarErrorDependieteEco($connectionDBsPro, $rfc, $curp, $curpConyuge, $nombre, $apellidoPaterno, $apellidoMaterno, $messgeEstatusError, $messageErrorMenorDupli,$lineaExel, $idCtrlCargaMasiva);
                                        //echo "$lineaExel - $curpConyuge - Ya se encuentra registrado";
                                        insertarErrorDependieteEco($rfc, $curp, $curpConyuge, $nombre, $apellidoPaterno, $apellidoMaterno, $messgeEstatusError, $messageErrorMenorDupli, $lineaExel, $idCtrlCargaMasiva);
                                        $registroError++;
                                    }




                                } else { ///LA EDAD DEL MENOR ES MAYOR PARA EL PRODUCTO
                                    //insertarErrorDependieteEco($connectionDBsPro, $rfc, $curp, $curpConyuge, $nombre, $apellidoPaterno, $apellidoMaterno, $messgeEstatusError,$messageErrorMenorDupli,$lineaExel, $idCtrlCargaMasiva);
                                    //echo "$lineaExel - $curpConyuge - LA edad es mayor";
                                    insertarErrorDependieteEco($rfc, $curp, $curpConyuge, $nombre, $apellidoPaterno, $apellidoMaterno, $messgeEstatusError, $messageErrorMenor, $lineaExel, $idCtrlCargaMasiva);
                                    $registroError++;

                                    //echo "$rfc / $curp empleado, $curpConyuge $edadMenor, El menor no cumple con la edad";
                                    //echo "<br>";
                                }
                            } else {///CURP DEL MENOR INVALIDA
                                //insertarErrorDependieteEco($connectionDBsPro, $rfc, $curp, $curpConyuge, $nombre, $apellidoPaterno, $apellidoMaterno, $messgeEstatusError, $messageErrorMenorDupli,$lineaExel, $idCtrlCargaMasiva);
                                //echo "$lineaExel - $curpConyuge - curp invalida del menor";
                                insertarErrorDependieteEco($rfc, $curp, $curpConyuge, $nombre, $apellidoPaterno, $apellidoMaterno, $messgeEstatusError, $messageErrorMenorCurp, $lineaExel, $idCtrlCargaMasiva);
                                $registroError++;
                                //echo "$rfc / $curp empleado, $curpConyuge $edadMenor, CURP invalida";
                                //echo "<br>";
                            }
                            //echo "empleado $curp es verdadero - $idTblEmpleado - $dateCurp - $fecha - $edad";






                        } else {
                            //Empleados que No cumplen las caracteristicas para su regalo
                            //insertarErrorDependieteEco($connectionDBsPro, $rfc, $curp, $curpConyuge, $nombre, $apellidoPaterno, $apellidoMaterno, $messgeEstatusError, $messageErrorEmpleado,$messageErrorMenorDupli,$lineaExel, $idCtrlCargaMasiva);
                            //echo "$lineaExel - $curpConyuge - Empleado no cumple";
                            insertarErrorDependieteEco($rfc, $curp, $curpConyuge, $nombre, $apellidoPaterno, $apellidoMaterno, $messgeEstatusError, $messageErrorEmpleado, $lineaExel, $idCtrlCargaMasiva);
                            $registroError++;
                            //echo "$rfc / $curp empleado, $curpConyuge $edadMenor, El empleado no cumple con los criterios";
                            //echo "<br>";
                        }





                        //END*/
                    }
                }
                echo "<br>";
                $i++;
            }
        }
    }


    //echo $registroExito;
    $idCtrlCargaMasivaR = base64_encode(listarControlCargaMasivaByMax());
    $active = base64_encode("true");
    $registroExito = base64_encode($registroExito);
    $registroError = base64_encode($registroError);
    header("Location: ../../view/CargaMasiva/Listar.php?Me=$active&Re=$registroExito&Rr=$registroError&MS=$idCtrlCargaMasivaR");

}