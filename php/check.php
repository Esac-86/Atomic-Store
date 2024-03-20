<?php

include 'conexion.php';

if (isset($_POST['contact'])) {
    // Establecer la zona horaria según tu ubicación
    date_default_timezone_set('America/Bogota');

    // Verificar si los campos obligatorios no están vacíos
    if (
        !empty($_POST['nombre']) &&
        !empty($_POST['telefono']) &&
        !empty($_POST['email']) &&
        !empty($_POST['codigo'])
    ) {
        // Recoger los datos del formulario
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $cedula = $_POST['cedula'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $codigo = $_POST['codigo'];
        $preferencias = $_POST['preferencias'] ?? '';
        $fecha = date("Y-m-d H:i:s"); // Formato de fecha y hora correcto (Año-Mes-Día Hora:Minutos:Segundos)

        // Preparar la consulta SQL
        $consulta = $pdo->prepare("INSERT INTO registro_datos (nombre, telefono, cedula, email, direccion, ciudad, codigo, preferencias, fecha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Ejecutar la consulta
        $resultado = $consulta->execute([$nombre, $telefono, $cedula, $email, $direccion, $ciudad, $codigo, $preferencias, $fecha]);

        // Verificar el resultado de la ejecución
        if ($resultado) {
            echo '<script>alert("Tu registro se ha completado")
            window.location.href="../chekout.php";
            </script>';
        } else {
            echo '<script>alert("Ha ocurrido un problema: ' . $consulta->errorInfo()[2] . '")
            window.location.href="../chekout.php";
            </script>';
        }
    } else {
        echo '<script>alert("Debe llenar los campos obligatorios")
        window.location.href="../chekout.php";
        </script>';
    }
}
?>
