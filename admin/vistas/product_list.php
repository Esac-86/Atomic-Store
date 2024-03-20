<style>
    /* Estilos para la lista de productos */
    .product-list {
        color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        background-color: #333;
    }

    .product-list hr {
        border-color: #555;
        margin: 20px 0;
    }

    .product-list .media {
        align-items: center;
    }

    .product-list .media-left {
        margin-right: 20px;
    }

    .product-list .media-left .image {
        margin-bottom: 0;
    }

    .product-list .media-content {
        flex: 1;
    }

    .product-list .media-content p {
        margin-bottom: 5px;
    }

    .product-list .media-content .has-text-right {
        margin-top: 10px;
    }

    .product-list .button {
        margin-right: 10px;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .product-list .button.is-success {
        background-color: #28a745;
        color: white;
    }

    .product-list .button.is-success:hover {
        background-color: #218838;
    }

    .product-list .button.is-danger {
        background-color: #dc3545;
        color: white;
    }

    .product-list .button.is-danger:hover {
        background-color: #c82333;
    }

    .product-list .button.is-link {
        background-color: #007bff;
        color: white;
    }

    .product-list .button.is-link:hover {
        background-color: #0056b3;
    }
</style>

<div class="container pb-6 pt-6">
    <?php
        require_once "./php/main.php";

        # Eliminar producto #
        if (isset($_GET['product_id_del'])) {
            require_once "./php/producto_eliminar.php";
        }

        if (!isset($_GET['page'])) {
            $pagina = 1;
        } else {
            $pagina = (int)$_GET['page'];
            if ($pagina <= 1) {
                $pagina = 1;
            }
        }

        $pagina = limpiar_cadena($pagina);
        $url = "index.php?vista=product_list&page=";
        $registros = 15;
        $busqueda = "";

        # Paginador producto #
        $inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
        $tabla = "";

        $campos = "tblproductos.ID, tblproductos.Nombre, tblproductos.Descripcion, tblproductos.Precio, tblproductos.Imagen";

        if (isset($busqueda) && $busqueda != "") {

            $consulta_datos = "SELECT $campos FROM tblproductos WHERE tblproductos.Nombre LIKE '%$busqueda%' ORDER BY tblproductos.Nombre ASC LIMIT $inicio,$registros";

            $consulta_total = "SELECT COUNT(ID) FROM tblproductos WHERE Nombre LIKE '%$busqueda%'";

        } else {

            $consulta_datos = "SELECT $campos FROM tblproductos ORDER BY tblproductos.Nombre ASC LIMIT $inicio,$registros";

            $consulta_total = "SELECT COUNT(ID) FROM tblproductos";

        }

        $conexion = conexion();

        $datos = $conexion->query($consulta_datos);
        $datos = $datos->fetchAll();

        $total = $conexion->query($consulta_total);
        $total = (int)$total->fetchColumn();

        $Npaginas = ceil($total / $registros);

        if ($total >= 1 && $pagina <= $Npaginas) {
            $contador = $inicio + 1;
            $pag_inicio = $inicio + 1;
            foreach ($datos as $rows) {
                $tabla .= '
                    <article class="media">
                        <figure class="media-left">
                            <p class="image is-64x64">';
                $imagen = $rows['Imagen'];
                if (filter_var($imagen, FILTER_VALIDATE_URL)) {
                    $tabla .= '<img src="' . $imagen . '">';
                } else {
                    $tabla .= '<img src="./img/producto.png">';
                }
                $tabla .= '</p>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <strong>' . $contador . ' - ' . $rows['Nombre'] . '</strong><br>
                                    <strong>Descripción:</strong> ' . $rows['Descripcion'] . '<br>
                                    <strong>Precio:</strong> $' . $rows['Precio'] . '
                                </p>
                            </div>
                            <div class="has-text-right">
                                <a href="index.php?vista=product_update&product_id_up=' . $rows['ID'] . '" class="button is-success">Actualizar</a>
                                <a href="' . $url . $pagina . '&product_id_del=' . $rows['ID'] . '" class="button is-danger">Eliminar</a>
                            </div>
                        </div>
                    </article>

                    <hr>
                ';
                $contador++;
            }
            $pag_final = $contador - 1;
        } else {
            if ($total >= 1) {
                $tabla .= '
                    <p class="has-text-centered">
                        <a href="' . $url . '1" class="button is-link mt-4 mb-4">
                            Haz clic aquí para recargar el listado
                        </a>
                    </p>
                ';
            } else {
                $tabla .= '
                    <p class="has-text-centered">No hay registros en el sistema</p>
                ';
            }
        }

        if ($total > 0 && $pagina <= $Npaginas) {
            $tabla .= '<p class="has-text-right">Mostrando productos <strong>' . $pag_inicio . '</strong> al <strong>' . $pag_final . '</strong> de un <strong>total de ' . $total . '</strong></p>';
        }

        $conexion = null;
        echo '<div class="product-list">' . $tabla . '</div>';

        if ($total >= 1 && $pagina <= $Npaginas) {
            echo paginador_tablas($pagina, $Npaginas, $url, 7);
        }
    ?>
</div>
