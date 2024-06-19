<?php
include ('../../conexion.php');
//include ('../EmpleadosC/Listar.php');
//include ('../ControlJuguetesC/Listar.php');
include ('../MensajesC/mensajes.php');
//include ('../ControlCargaMasivaC/Listar.php');
//include ('../ControlErrorDependientesC/Listar.php');

function pagoJuguetes($archivo, $id_cat_fecha_juguetes, $id_cat_carga_masiva)
{
    include ('../MensajesC/mensajes.php');
    /// VARIABLES
    $id_usuario = $_SESSION['id_user'];
    $numMaxHijos = 1;
    $id_Cat_estatus_juguetes = 2;///Valor del catalogo para pagado en - cat_fecha_juguetes
    $messgeEstatusError = $mensajeErrorAgregar;
    $mensajeSinInformacion = $mensajeSinCurpRfcNohijosMonto;
    $mensajeSinHijos = $mensajeNoCoincideNoHijos;
    $messajeSinRegistroEmpleado = $mensajeSinRegistroEmpleado;
    $registroExito = 0;
    $registroError = 0;

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
            //echo $idCtrlCargaMasiva;

            agregarControlCargaMasivaNew($id_cat_carga_masiva, $id_usuario);
            $idCtrlCargaMasiva = listarControlCargaMasivaByMax();

            foreach ($lineas as $linea) {
                $cantidad_registros = count($lineas);
                $cantidad_regist_agregados = ($cantidad_registros - 4);
                $lineaExel = $i + 1;

                if ($i != 0) {
                    $datos = explode(",", $linea);

                    $rfc = !empty($datos[0]) ? trim($datos[0]) : '';
                    $curp = !empty($datos[1]) ? trim($datos[1]) : '';
                    $noHijos = !empty($datos[2]) ? trim($datos[2]) : '';
                    $monto = !empty($datos[3]) ? trim($datos[3]) : '';

                    if (empty($rfc) || empty($curp) || empty($noHijos) || empty($monto)) {
                        insertarErrorDependieteEco($rfc, $curp, '', '', '', '', $messgeEstatusError, $mensajeSinInformacion, $lineaExel, $idCtrlCargaMasiva);
                        $registroError++;
                    } else {
                        $idTblEmpleado = validacionEmpleado($curp, $rfc); ///id_tbl_empleado

                        if (!empty($idTblEmpleado)) {
                            /// SE ENCUENTRAN LOS DATOS DEL EMPLEADO
                            if (listadoControlJuguetesByCount($idTblEmpleado, $id_cat_fecha_juguetes) == $noHijos) {
                                ///SE ENCUENTRA LA CANTIDAD DE HIJOS IGUAL A LA DEL EXEL
                                if ($noHijos == $numMaxHijos) {
                                    // echo "$rfc - $curp - $noHijos - $monto - $lineaExel -id $idTblEmpleado - " ;
                                    updateCtrlJuguetesByEstatus($id_Cat_estatus_juguetes, $monto, $idTblEmpleado, $id_cat_fecha_juguetes);
                                    //echo "Actualizado linea $lineaExel";
                                    $registroExito++;
                                } else {
                                    $monto /= $noHijos;
                                    updateCtrlJuguetesByEstatus($id_Cat_estatus_juguetes, $monto, $idTblEmpleado, $id_cat_fecha_juguetes);
                                    //ech   o "Actualizado linea $lineaExel";
                                    $registroExito++;
                                }

                            } else {
                                ///NO COINCIDEN
                                //echo "Error, no coinciden el no de hijos  linea $lineaExel";
                                insertarErrorDependieteEco($rfc, $curp, '', '', '', '', $messgeEstatusError, $mensajeSinHijos, $lineaExel, $idCtrlCargaMasiva);
                                $registroError++;
                            }
                        } else {
                            ///NO SE ENCUENTRAN LOS DATOS DEL EMPEADO
                            //echo "Error, Sin registro de empleado  linea $lineaExel";
                            $registroError++;
                            insertarErrorDependieteEco($rfc, $curp, '', '', '', '', $messgeEstatusError, $messajeSinRegistroEmpleado, $lineaExel, $idCtrlCargaMasiva);
                        }

                    }
                }
                //echo "<br>";
                $i++;
            }

        }
    }

    $idCtrlCargaMasivaR = base64_encode(listarControlCargaMasivaByMax());
    $active = base64_encode("true");
    $registroExito = base64_encode($registroExito);
    $registroError = base64_encode($registroError);
    header("Location: ../../view/CargaMasiva/Listar.php?Me=$active&Re=$registroExito&Rr=$registroError&MS=$idCtrlCargaMasivaR");
}

