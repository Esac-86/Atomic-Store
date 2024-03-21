<style>
    /* Estilos para la lista de productos */
    .media {
        color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        background-color: #333;
    }

    .media hr {
        border-color: #555;
        margin: 20px 0;
    }

    .media .media-left {
        align-items: center;
    }

    .media .media-left .image {
        margin-right: 20px;
    }

    .media .media-left .image p {
        margin-bottom: 0;
    }

    .media .media-content {
        flex: 1;
    }

    .media .media-content p {
        margin-bottom: 5px;
    }

    .media .media-content .has-text-right {
        margin-top: 10px;
    }

    .media .button {
        margin-right: 10px;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .media .button.is-success {
        background-color: #28a745;
        color: white;
    }

    .media .button.is-success:hover {
        background-color: #218838;
    }

    .media .button.is-danger {
        background-color: #dc3545;
        color: white;
    }

    .media .button.is-danger:hover {
        background-color: #c82333;
    }

    /* Estilos para los iconos */
    .fa {
        margin-right: 5px;
    }
</style>

<?php
$inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
$tabla = "";

$campos = "ID, Nombre, Precio, Descripcion, Imagen";

if (isset($busqueda) && $busqueda != "") {

    $consulta_datos = "SELECT $campos FROM tblproductos WHERE Nombre LIKE '%$busqueda%' OR Descripcion LIKE '%$busqueda%' ORDER BY Nombre ASC LIMIT $inicio,$registros";

    $consulta_total = "SELECT COUNT(ID) FROM tblproductos WHERE Nombre LIKE '%$busqueda%' OR Descripcion LIKE '%$busqueda%'";

} else {

    $consulta_datos = "SELECT $campos FROM tblproductos ORDER BY Nombre ASC LIMIT $inicio,$registros";

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
        if (is_file("./img/producto/" . $rows['Imagen'])) {
            $tabla .= '<img src="./img/producto/' . $rows['Imagen'] . '">';
        } else {
            $tabla .= '<img src="./img/producto.png">';
        }
        $tabla .= '</p>
                </figure>
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong>' . $contador . ' - ' . $rows['Nombre'] . '</strong><br>
                            <strong>PRECIO:</strong> $' . $rows['Precio'] . ', <strong>DESCRIPCION:</strong> ' . $rows['Descripcion'] . '
                        </p>
                    </div>
                    <div class="has-text-right">
                        <a href="index.php?vista=product_update&product_id_up=' . $rows['ID'] . '" class="button is-success is-rounded is-small"><i class="fa fa-arrow-down"></i> Actualizar</a>
                        <a href="' . $url . $pagina . '&product_id_del=' . $rows['ID'] . '" class="button is-danger is-rounded is-small"><i class="fa fa-trash"></i> Eliminar</a>
                    </div>
                </div>
            </article>
            <hr>';
        $contador++;
    }
    $pag_final = $contador - 1;
} else {
    if ($total >= 1) {
        $tabla .= '<p class="has-text-centered"><a href="' . $url . '1" class="button is-link is-rounded is-small mt-4 mb-4">Haga clic acá para recargar el listado</a></p>';
    } else {
        $tabla .= '<p class="has-text-centered">No hay registros en el sistema</p>';
    }
}

if ($total > 0 && $pagina <= $Npaginas) {
    $tabla .= '<p class="has-text-right">Mostrando productos <strong>' . $pag_inicio . '</strong> al <strong>' . $pag_final . '</strong> de un <strong>total de ' . $total . '</strong></p>';
}

$conexion = null;
echo $tabla;

// if ($total >= 1 && $pagina <= $Npaginas) {
//     echo paginador_tablas($pagina, $Npaginas, $url, 7);
// }
?>