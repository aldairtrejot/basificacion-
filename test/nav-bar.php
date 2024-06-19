<?php
// Establecer la conexión con la base de datos
$conexion = pg_connect("host=localhost dbname=sirh user=postgres password=pg2024");

if (!$conexion) {
  die("Error al conectar a la base de datos.");
}

// Consultar las opciones desde la base de datos
$query = "SELECT id_cat_entidad, entidad FROM cat_entidad";
$resultado = pg_query($conexion, $query);

if (!$resultado) {
  die("Error al consultar la base de datos.");
}

// Crear un array asociativo con las opciones
$opciones = array();
while ($fila = pg_fetch_assoc($resultado)) {
  $opciones[] = $fila;
}

// Convertir el array a formato JSON y enviarlo como respuesta
echo json_encode($opciones);

// Cerrar la conexión con la base de datos
pg_close($conexion);
?>