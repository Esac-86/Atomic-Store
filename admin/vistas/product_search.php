<div class="container pb-6 pt-12">
    <style>
        /* Estilos para el contenedor principal */
        html{
            height: 100vh;
            background-color: rgb(48, 48, 48);
        }
        body{
            max-width: 100%;
            height: 100%;
        }
        
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: rgb(48, 48, 48);
            color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilos para el formulario de búsqueda */
        .search-form {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-input {
            flex: 1;
            padding: 12px;
            border: 2px solid #777;
            border-radius: 5px 0 0 5px;
            font-size: 16px;
            outline: none;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            transition: border-color 0.3s, background-color 0.3s;
        }

        .search-input::placeholder {
            color: #999;
        }

        .search-input:focus {
            border-color: #4CAF50;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .search-button {
            padding: 15px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        .search-button:hover {
            background-color: #45a049;
        }

        /* Estilos para el botón de eliminar búsqueda */
        .delete-button {
            padding: 15px 20px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        .delete-button:hover {
            background-color: #c82333;
        }
    </style>

    <?php
    require_once "./php/main.php";

    if (isset($_POST['modulo_buscador'])) {
        require_once "./php/buscador.php";
    }

    if (!isset($_SESSION['busqueda_producto']) || empty($_SESSION['busqueda_producto'])) {
    ?>
        <div class="columns">
            <div class="column">
                <form action="" method="POST" autocomplete="off" class="search-form">
                    <input type="hidden" name="modulo_buscador" value="producto">
                    <input class="search-input" type="text" name="txt_buscador" placeholder="¿Qué estás buscando?" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" maxlength="30">
                    <button class="search-button" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    <?php } else { ?>
        <div class="columns">
            <div class="column">
                <div class="column">
                    <form action="" method="POST" autocomplete="off" class="search-form">
                        <input type="hidden" name="modulo_buscador" value="producto">
                        <input type="hidden" name="eliminar_buscador" value="producto">
                        <div class="search-message" style="width: fit-content; margin: 0 auto;">
                            <p style="text-align: center;">Estás buscando <strong style="color: white;">“<?php echo $_SESSION['busqueda_producto']; ?>”</strong></p>
                            <br>
                            <button type="submit" class="delete-button" style="display: block; margin: auto;">Eliminar búsqueda</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }

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
    $url = "index.php?vista=product_search&page=";
    $registros = 15;
    $busqueda = isset($_SESSION['busqueda_producto']) ? $_SESSION['busqueda_producto'] : '';

    require_once "./php/producto_lista.php";
    ?>
</div>
