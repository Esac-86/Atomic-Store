<style>
    /* Estilos para el contenedor de encabezado */
    .header-container {
        margin-bottom: 30px;
    }

    .header-container .title {
        color: #fff;
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .header-container .subtitle {
        color: #ccc;
        font-size: 1.5rem;
    }

    /* Estilos para las imágenes y formulario de actualización */
    .update-container {
        background-color: #333;
        color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 30px;
    }

    .update-container .image {
        margin-bottom: 20px;
    }

    .update-container .has-text-centered {
        margin-top: 20px;
    }

    .update-container .file-name {
        color: #ccc;
    }

    .update-container .button {
        margin-top: 20px;
    }
</style>

<div class="container is-fluid mb-6 header-container">
    <h1 class="title">Productos</h1>
    <h2 class="subtitle">Actualizar imagen de producto</h2>
</div>

<div class="container pb-6 pt-6 update-container">
    <?php
        include "./inc/btn_back.php";
        require_once "./php/main.php";

        $id = (isset($_GET['ID'])) ? $_GET['ID'] : 0;

        /*== Verificando producto ==*/
        $check_producto = conexion();
        $check_producto = $check_producto->query("SELECT * FROM tblproductos WHERE ID='$id'");

        if ($check_producto->rowCount() > 0) {
            $datos = $check_producto->fetch();
    ?>

    <div class="form-rest mb-6 mt-6"></div>

    <div class="columns">
        <div class="column is-two-fifths">
            <?php if (is_file("./img/producto/" . $datos['Imagen'])) { ?>
            <figure class="image mb-6">
                <img src="./img/producto/<?php echo $datos['Imagen']; ?>">
            </figure>
            <form class="FormularioAjax" action="./php/producto_img_eliminar.php" method="POST" autocomplete="off">
                <input type="hidden" name="img_del_id" value="<?php echo $datos['ID']; ?>">
                <p class="has-text-centered">
                    <button type="submit" class="button is-danger is-rounded">Eliminar imagen</button>
                </p>
            </form>
            <?php } else { ?>
            <figure class="image mb-6">
                <img src="./img/producto.png">
            </figure>
            <?php } ?>
        </div>
        <div class="column">
            <form class="mb-6 has-text-centered FormularioAjax" action="./php/producto_img_actualizar.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <h4 class="title is-4 mb-6"><?php echo $datos['Nombre']; ?></h4>
                <label>Foto o imagen del producto</label><br>
                <input type="hidden" name="img_up_id" value="<?php echo $datos['ID']; ?>">
                <div class="file has-name is-horizontal is-justify-content-center mb-6">
                    <label class="file-label">
                        <input class="file-input" type="file" name="producto_foto" accept=".jpg, .png, .jpeg">
                        <span class="file-cta">
                            <span class="file-label">Imagen</span>
                        </span>
                        <span class="file-name">JPG, JPEG, PNG. (MAX 3MB)</span>
                    </label>
                </div>
                <p class="has-text-centered">
                    <button type="submit" class="button is-success is-rounded">Actualizar</button>
                </p>
            </form>
        </div>
    </div>
    <?php 
        } else {
            include "./inc/error_alert.php";
        }
        $check_producto = null;
    ?>
</div>
