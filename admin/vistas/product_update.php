<style>
    html{
        height: 100vh;
        background-color: rgb(48, 48, 48);
    }
    body{
        max-width: 100%;
        height: 100%;
    }
    .container {
        background-color: #333;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-top: 25px;
    }

    .form-rest {
        margin-bottom: 6px;
        margin-top: 6px;
    }

    h2 {
        text-align: center;
        font-weight: bold;
        font-size: 1.6rem; 
    }

    .input-field {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    label {
        font-weight: bold;
    }

    .button {
        padding: 10px 20px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .button:hover {
        background-color: #218838;
    }
</style>

<body>
    <div class="container">
        <?php
            include "./inc/btn_back.php";

            require_once "./php/main.php";

            $ID = (isset($_GET['product_id_up'])) ? $_GET['product_id_up'] : 0;
            $ID = limpiar_cadena($ID);

            /*== Verificando producto ==*/
            $check_producto = conexion();
            $check_producto = $check_producto->query("SELECT * FROM tblproductos WHERE ID='$ID'");

            if ($check_producto->rowCount() > 0) {
                $datos = $check_producto->fetch();
        ?>

        <div class="form-rest mb-6 mt-6"></div>
        
        <h2><?php echo $datos['Nombre']; ?></h2>

        <form action="./php/producto_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">

            <input type="hidden" name="ID" value="<?php echo $datos['ID']; ?>" required>

            <div class="columns">
                <div class="column">
                    <div class="control">
                        <label>Nombre</label>
                        <input class="input-field" type="text" name="Nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required value="<?php echo $datos['Nombre']; ?>">
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="control">
                        <label>Precio</label>
                        <input class="input-field" type="text" name="Precio" pattern="[0-9.]{1,25}" maxlength="25" required value="<?php echo $datos['Precio']; ?>">
                    </div>
                </div>
                <div class="column">
                    <div class="control">
                        <label>Descripción</label>
                        <textarea class="input-field" name="Descripcion" maxlength="255"><?php echo $datos['Descripcion']; ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Nuevos campos para la imagen -->
            <div class="columns">
                <div class="column">
                    <div class="control">
                        <label>Imagen</label>
                        <input class="input-field" type="file" name="Imagen">
                    </div>
                </div>
            </div>

            <p style="text-align: center;">
                <button type="submit" class="button">Actualizar</button>
            </p>
        </form>
        <?php 
            } else {
                include "./inc/error_alert.php";
            }
            $check_producto = null;
        ?>
    </div>
</body>


