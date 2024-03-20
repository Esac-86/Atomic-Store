<?php
    require_once "../inc/session_start.php";
    require_once "main.php";

    /*== Almacenando datos ==*/
    $nombre = limpiar_cadena($_POST['Nombre']);
    $precio = limpiar_cadena($_POST['Precio']);
    $descripcion = limpiar_cadena($_POST['Descripcion']);

    /*== Verificando campos obligatorios ==*/
    if ($nombre == "" || $precio == "" || $descripcion == "") {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }

    /*== Verificando integridad de los datos ==*/
    if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}", $nombre)) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if (verificar_datos("[0-9.]{1,25}", $precio)) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                El PRECIO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    /* Directorio de imágenes */
    $img_dir = '../img/producto/';

    /*== Obtener URL de la imagen ==*/
    $imagen_url = '';

    /* Comprobando si se ha seleccionado una imagen */
    if ($_FILES['Imagen']['name'] != "" && $_FILES['Imagen']['size'] > 0) {
        /* Comprobando formato de la imagen */
        $img_extension = strtolower(pathinfo($_FILES['Imagen']['name'], PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png'];

        if (!in_array($img_extension, $allowed_extensions)) {
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrió un error inesperado!</strong><br>
                    La imagen que has seleccionado es de un formato que no está permitido
                </div>
            ';
            exit();
        }

        /* Moviendo la imagen al directorio */
        $img_nombre = renombrar_fotos($nombre);
        $img_destino = $img_dir . $img_nombre . '.' . $img_extension;

        if (!move_uploaded_file($_FILES['Imagen']['tmp_name'], $img_destino)) {
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrió un error inesperado!</strong><br>
                    No podemos subir la imagen al sistema en este momento, por favor inténtalo nuevamente
                </div>
            ';
            exit();
        }

        /* Obteniendo la URL de la imagen */
        $imagen_url = obtener_url($img_destino);
    }

    /*== Guardando datos ==*/
    $guardar_producto = conexion();
    $guardar_producto = $guardar_producto->prepare("INSERT INTO tblproductos(Nombre, Precio, Descripcion, Imagen) VALUES(:nombre, :precio, :descripcion, :imagen_url)");

    $marcadores = [
        ":nombre" => $nombre,
        ":precio" => $precio,
        ":descripcion" => $descripcion,
        ":imagen_url" => $imagen_url
    ];

    $guardar_producto->execute($marcadores);

    if ($guardar_producto->rowCount() == 1) {
        echo '
            <div class="notification is-info is-light">
                <strong>¡PRODUCTO REGISTRADO!</strong><br>
                El producto se registró con éxito
            </div>
        ';
    } else {
        if ($imagen_url != '') {
            unlink($img_destino);
        }

        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No se pudo registrar el producto, por favor inténtalo nuevamente
            </div>
        ';
    }
    $guardar_producto = null;

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
