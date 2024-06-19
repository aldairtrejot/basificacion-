<?php
$username = 'rodolfo.trejo';
$password = 'trejo2024';

// URL base de la API de ownCloud
$baseUrl = 'https://9klehjkq.rcsrv.net/';

//https://9klehjkq.rcsrv.net//ocs/v1.php/cloud/user

// Endpoint de autenticación de ownCloud
$authUrl = $baseUrl . '/ocs/v1.php/cloud/user';

// Datos para la solicitud POST
$data = array(
    'login' => $username,
    'password' => $password
);

// Inicializar cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $authUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la solicitud
$response = curl_exec($ch);

// Verificar errores
if(curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

// Cerrar la conexión
curl_close($ch);

// Procesar la respuesta JSON
$response_data = json_decode($response, true);

// Verificar la respuesta
if(isset($response_data['ocs']['data']['id'])) {
    // Inicio de sesión exitoso
    session_start();
    $_SESSION['user_id'] = $response_data['ocs']['data']['id'];
    $_SESSION['user_displayname'] = $response_data['ocs']['data']['displayname'];
    
    // Redirigir a la página principal o a donde desees después del inicio de sesión
    header('Location: index.php');
    exit;
} else {
    // Inicio de sesión fallido, mostrar mensaje de error
    echo 'Inicio de sesión fallido. Verifica tus credenciales.';
}
