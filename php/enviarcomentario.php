<?php  

include 'details.php';

// Llamando a los campos
$user = $_POST['user'];

$comentario= $_POST['comentario'];

$conexion=mysqli_connect("localhost","root","","atomic_db");  

$user= mysqli_real_escape_string($conexion,$user);
$comentario= mysqli_real_escape_string($conexion,$comentario);
$resultado=mysqli_query($conexion,'INSERT INTO comentarios (user, comentario) VALUES ("'.$user.'", "'.$comentario.'")');

echo '<script>alert("Comentario Añadido")</script>';

?>