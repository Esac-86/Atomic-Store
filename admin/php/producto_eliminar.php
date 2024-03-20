<?php
    require_once "./php/main.php";

    if (isset($_GET['product_id_del'])) {
        $product_id_del = limpiar_cadena($_GET['product_id_del']);

        $conexion = conexion();
        $consulta_producto = $conexion->prepare("SELECT * FROM tblproductos WHERE ID = :id");
        $consulta_producto->execute([":id" => $product_id_del]);

        if ($consulta_producto->rowCount() == 1) {
            $datos = $consulta_producto->fetch();

            $eliminar_producto = $conexion->prepare("DELETE FROM tblproductos WHERE ID = :id");
            $eliminar_producto->execute([":id" => $product_id_del]);

            if ($eliminar_producto->rowCount() == 1) {
                if (is_file("./img/producto/" . $datos['Imagen'])) {
                    chmod("./img/producto/" . $datos['Imagen'], 0777);
                    unlink("./img/producto/" . $datos['Imagen']);
                }

                echo '
                    <div class="notification is-info is-light">
                        <strong>¡PRODUCTO ELIMINADO!</strong><br>
                        Los datos del producto se eliminaron con éxito.
                    </div>
                ';
            } else {
                echo '
                    <div class="notification is-danger is-light">
                        <strong>¡Ocurrió un error inesperado!</strong><br>
                        No se pudo eliminar el producto, por favor intente nuevamente.
                    </div>
                ';
            }
        } else {
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrió un error inesperado!</strong><br>
                    El producto que intenta eliminar no existe.
                </div>
            ';
        }

        $conexion = null;
        $consulta_producto = null;
        $eliminar_producto = null;
    }
?>
