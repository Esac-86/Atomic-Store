<?php
    require_once "main.php";

    /*== Almacenando datos ==*/
    $product_id = limpiar_cadena($_POST['img_up_id']);

    /*== Verificando producto ==*/
    $check_producto = conexion();
    $check_producto = $check_producto->query("SELECT * FROM producto WHERE producto_id='$product_id'");

    if ($check_producto->rowCount() == 1) {
        $datos = $check_producto->fetch();
    } else {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                La imagen del PRODUCTO que intenta actualizar no existe
            </div>
        ';
        exit();
    }
    $check_producto = null;


    /*== Comprobando si se ha seleccionado una imagen ==*/
    if ($_FILES['producto_foto']['name'] == "" || $_FILES['producto_foto']['size'] == 0) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No ha seleccionado ninguna imagen o foto
            </div>
        ';
        exit();
    }


    /* Directorio de imágenes */
    $img_dir = '../img/producto/';

    /* Creando directorio de imágenes */
    if (!file_exists($img_dir)) {
        if (!mkdir($img_dir, 0777)) {
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrió un error inesperado!</strong><br>
                    Error al crear el directorio de imágenes
                </div>
            ';
            exit();
        }
    }


    /* Cambiando permisos al directorio */
    chmod($img_dir, 0777);


    /* Comprobando formato de las imágenes */
    if ($_FILES['producto_foto']['type'] != "image/jpeg" && $_FILES['producto_foto']['type'] != "image/png") {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                La imagen que ha seleccionado es de un formato que no está permitido
            </div>
        ';
        exit();
    }


    /* Comprobando que la imagen no supere el peso permitido */
    if (($_FILES['producto_foto']['size'] / 1024) > 3072) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                La imagen que ha seleccionado supera el límite de peso permitido
            </div>
        ';
        exit();
    }


    /* Extensión de las imágenes */
    $img_ext = "";
    if ($_FILES['producto_foto']['type'] == "image/jpeg") {
        $img_ext = ".jpg";
    } else if ($_FILES['producto_foto']['type'] == "image/png") {
        $img_ext = ".png";
    }

    /* Nombre de la imagen */
    $img_nombre = renombrar_fotos($datos['producto_nombre']);

    /* Nombre final de la imagen */
    $foto = $img_nombre . $img_ext;

    /* Moviendo imagen al directorio */
    if (!move_uploaded_file($_FILES['producto_foto']['tmp_name'], $img_dir . $foto)) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No podemos subir la imagen al sistema en este momento, por favor inténtelo nuevamente
            </div>
        ';
        exit();
    }


    /* Eliminando la imagen anterior */
    if (is_file($img_dir . $datos['producto_foto']) && $datos['producto_foto'] != $foto) {
        chmod($img_dir . $datos['producto_foto'], 0777);
        unlink($img_dir . $datos['producto_foto']);
    }


    /*== Actualizando datos ==*/
    $actualizar_producto = conexion();
    $actualizar_producto = $actualizar_producto->prepare("UPDATE producto SET producto_foto=:foto WHERE producto_id=:id");

    $marcadores = [
        ":foto" => $foto,
        ":id" => $product_id
    ];

    if ($actualizar_producto->execute($marcadores)) {
        $url = "http://" . $_SERVER['HTTP_HOST'] . "/";
        echo '
            <div class="notification is-info is-light">
                <strong>¡IMAGEN O FOTO ACTUALIZADA!</strong><br>
                La imagen del producto ha sido actualizada exitosamente. Aquí está el enlace para visualizarla:<br>
                <a href="' . $url . 'img/producto/' . $foto . '" target="_blank">' . $url . 'img/producto/' . $foto . '</a>
            </div>
        ';
    } else {

        if (is_file($img_dir . $foto)) {
            chmod($img_dir . $foto, 0777);
            unlink($img_dir . $foto);
        }

        echo '
            <div class="notification is-warning is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No podemos subir la imagen al sistema en este momento, por favor inténtelo nuevamente
            </div>
        ';
    }
    $actualizar_producto = null;
?>
