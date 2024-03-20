<?php
require_once "../inc/session_start.php";
require_once "main.php";

/*== Almacenando datos ==*/
$ID = limpiar_cadena($_POST['ID']);
$Nombre = limpiar_cadena($_POST['Nombre']);
$Precio = limpiar_cadena($_POST['Precio']);
$Descripcion = limpiar_cadena($_POST['Descripcion']);

/*== Verificando campos obligatorios ==*/
if ($Nombre === "" || $Precio === "" || $Descripcion === "") {
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios.
        </div>
    ';
    exit();
}

/*== Verificando integridad de los datos ==*/
if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}", $Nombre)) {
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            El NOMBRE no coincide con el formato solicitado.
        </div>
    ';
    exit();
}

if (verificar_datos("[0-9.]{1,25}", $Precio)) {
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            El PRECIO no coincide con el formato solicitado.
        </div>
    ';
    exit();
}

/*== Directorio de imágenes ==*/
$img_dir = '../img/producto/';

/*== Obtener URL de la imagen ==*/
$imagen_url = '';

/* Comprobando si se ha seleccionado una imagen */
if ($_FILES['Imagen']['error'] === UPLOAD_ERR_OK) {
    /* Comprobando formato de la imagen */
    $img_extension = strtolower(pathinfo($_FILES['Imagen']['name'], PATHINFO_EXTENSION));
    $allowed_extensions = ['jpg', 'jpeg', 'png'];

    if (!in_array($img_extension, $allowed_extensions)) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                La imagen que has seleccionado es de un formato que no está permitido.
            </div>
        ';
        exit();
    }

    /* Moviendo la imagen al directorio */
    $img_nombre = renombrar_fotos($Nombre);
    $img_destino = $img_dir . $img_nombre . '.' . $img_extension;

    if (!move_uploaded_file($_FILES['Imagen']['tmp_name'], $img_destino)) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No podemos subir la imagen al sistema en este momento, por favor inténtalo nuevamente.
            </div>
        ';
        exit();
    }

    /* Obteniendo la URL de la imagen */
    $imagen_url = obtener_url($img_destino);
}

/*== Actualizando datos ==*/
$actualizar_producto = conexion();
$actualizar_producto = $actualizar_producto->prepare("UPDATE tblproductos SET Nombre=:nombre, Precio=:precio, Descripcion=:descripcion, Imagen=:imagen_url WHERE ID=:id");

$marcadores = [
    ":nombre" => $Nombre,
    ":precio" => $Precio,
    ":descripcion" => $Descripcion,
    ":imagen_url" => $imagen_url,
    ":id" => $ID
];

$actualizar_producto->execute($marcadores);

if ($actualizar_producto->rowCount() === 1) {
    echo '
        <div class="notification is-info is-light">
            <strong>¡PRODUCTO ACTUALIZADO!</strong><br>
            El producto se actualizó con éxito.
        </div>
    ';
} else {
    if ($imagen_url !== '') {
        unlink($img_destino);
    }

    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            No se pudo actualizar el producto, por favor intente nuevamente.
        </div>
    ';
}

$actualizar_producto = null;

/**
 * Función para obtener la URL de la imagen.
 * @param string $ruta Ruta de la imagen en el servidor.
 * @return string URL de la imagen.
 */
function obtener_url($ruta) {
    $base_url = 'http://atomicstore.000.pe/admin/'; // Reemplaza esta URL con la URL de tu proyecto
    $ruta_relativa = str_replace('../', '', $ruta);
    return $base_url . $ruta_relativa;
}
?>
