<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carousel con Bootstrap</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:#FF0000;">

  <?php
  $var = 5;

  $classActive = 'carousel-item active';
  $classItem = 'carousel-item';

  if ($var != 5) {
    $classItem = 'carousel-item active';
  }

  ?>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <?php if ($var == 1 || $var == 5) { ?>
        <div class="<?php echo $classActive ?>">
          <img class="d-block w-100" src="..." alt="First slide">
        </div>
      <?php } ?>
      <?php if ($var == 2 || $var == 5) { ?>
        <div class="<?php echo $classItem ?>">
          <img class="d-block w-100" src="..." alt="Second slide">
        </div>
      <?php } ?>
      <?php if ($var == 3 || $var == 5) { ?>
        <div class="<?php echo $classItem ?>">
          <img class="d-block w-100" src="..." alt="Third slide">
        </div>
      <?php } ?>
    </div>
  </div>


      <!--
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="..." alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="..." alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="..." alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
      -->


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>



<?php

$UR = "https://repocloud.imssbienestar.gob.mx/login";
$usuario = 'rodolfo.trejo';
$password = '/lm3u4Xljh_1';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$usuario:$password");
$result = curl_exec($ch);
curl_close($ch);
return $result;


/**
 * Clase para consumir API Rest
 * Las operaciones soportadas son:
 * 	
 * 	- POST		: Agregar
 * 	- GET		: Consultar
 * 	- DELETE	: Eliminar
 * 	- PUT		: Actualizar
 * 	- PATCH		: Actualizar por parte
 * 
 * Extras
 * 	- autenticación de acceso básica (Basic Auth)
 *  	- Conversor JSON
 *
 * @author     	Diego Valladares <dvdeveloper.com>
 * @version 	1.0
 */
class API
{

  /**
   * autenticación de acceso básica (Basic Auth)
   * Ejemplo Authorization: Basic QWxhZGRpbjpvcGVuIHNlc2FtZQ==
   *
   * @param string $URL url para acceder y obtener un token
   * @param string $usuario usuario
   * @param string $password clave
   * @return JSON
   */
  static function Authentication($URL, $usuario, $password)
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$usuario:$password");
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
  }

  /**
   * Enviar parámetros a un servidor a través del protocolo HTTP (POST).
   * Se utiliza para agregar datos en una API REST
   *
   * @param string $URL URL recurso, ejemplo: http://website.com/recurso
   * @param string $TOKEN token de autenticación
   * @param array $ARRAY parámetros a envíar
   * @return JSON
   */
  static function POST($URL, $TOKEN, $ARRAY)
  {
    $datapost = '';
    foreach ($ARRAY as $key => $value) {
      $datapost .= $key . "=" . $value . "&";
    }

    $headers = array('Authorization: Bearer ' . $TOKEN);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datapost);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
  }

  /**
   * Consultar a un servidor a través del protocolo HTTP (GET).
   * Se utiliza para consultar recursos en una API REST
   *
   * @param string $URL URL recurso, ejemplo: http://website.com/recurso/(id) no obligatorio
   * @param string $TOKEN token de autenticación
   * @return JSON
   */
  static function GET($URL, $TOKEN)
  {
    $headers = array('Authorization: Bearer ' . $TOKEN);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
  }

  /**
   * Consultar a un servidor a través del protocolo HTTP (DELETE).
   * Se utiliza para eliminar recursos en una API REST
   *
   * @param string $URL URL recurso, ejemplo: http://website.com/recurso/id
   * @param string $TOKEN token de autenticación
   * @return JSON
   */
  static function DELETE($URL, $TOKEN)
  {
    $headers = array('Authorization: Bearer ' . $TOKEN);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
  }

  /**
   * Enviar parámetros a un servidor a través del protocolo HTTP (PUT).
   * Se utiliza para editar un recurso en una API REST
   *
   * @param string $URL URL recurso, ejemplo: http://website.com/recurso/id
   * @param string $TOKEN token de autenticación
   * @param array $ARRAY parámetros a envíar
   * @return JSON
   */
  static function PUT($URL, $TOKEN, $ARRAY)
  {
    $datapost = '';
    foreach ($ARRAY as $key => $value) {
      $datapost .= $key . "=" . $value . "&";
    }

    $headers = array('Authorization: Bearer ' . $TOKEN);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datapost);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
  }

  /**
   * Enviar parámetros a un servidor a través del protocolo HTTP (PATCH).
   * Se utiliza para editar un atributo específico (recurso) en una API REST
   *
   * @param string $URL URL recurso, ejemplo: http://website.com/recurso/id
   * @param string $TOKEN token de autenticación
   * @param array $ARRAY parametros parámetros a envíar
   * @return JSON
   */
  static function PATCH($URL, $TOKEN, $ARRAY)
  {
    $datapost = '';
    foreach ($ARRAY as $key => $value) {
      $datapost .= $key . "=" . $value . "&";
    }

    $headers = array('Authorization: Bearer ' . $TOKEN);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datapost);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
  }

  /**
   * Convertir JSON a un ARRAY
   *
   * @param json $json Formato JSON
   * @return ARRAY
   */
  static function JSON_TO_ARRAY($json)
  {
    return json_decode($json, true);
  }
}
?>