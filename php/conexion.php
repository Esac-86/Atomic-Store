<?php

// Datos de conexión a la base de datos
$host = 'monorail.proxy.rlwy.net';
$port = '47577'; // Reemplaza 'tu_puerto' con el número de puerto correcto
$dbname = 'railway';
$username = 'root';
$password = 'rnVtHWboMsdmsuFSdZgoPUWPwEGSmJAE'; // Coloca la contraseña si es necesaria

try {
    // Establecer conexión a la base de datos MySQL utilizando PDO
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    
    // Habilitar el modo de errores de PDO para ver los errores fácilmente
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Opcional: Establecer el juego de caracteres de la conexión a UTF-8
    $pdo->exec('SET NAMES utf8');
    
    // Opcional: Otros ajustes de configuración de PDO si es necesario
} catch (PDOException $e) {
    // Manejar cualquier error de conexión
    echo 'Error al conectar con la base de datos: ' . $e->getMessage();
    die(); // Terminar el script si hay un error de conexión
}

?>
