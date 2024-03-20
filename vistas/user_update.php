<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #333;
        }

        h1, h2 {
            text-align: center;
			font-weight: bold;
        }

        /* Estilos para el formulario */
        form {
            max-width: 900px;
            margin: 0 auto;
        }

        /* Estilos para las etiquetas */
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        /* Estilos para los inputs */
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: calc(100%);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Estilos para los botones */
        .button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            display: block;
        }

        .button:hover {
            background-color: #218838;
        }

        /* Estilos para las filas */
        .row {
			width: 100%;
			gap: 25px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
		}

		.form-group {
            width: 100%;
			display: flex;
			flex-direction: column;
			margin: auto; 
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    require_once "./php/main.php";

    // Verificar si $id está definida
    $id = isset($_GET['user_id_up']) ? limpiar_cadena($_GET['user_id_up']) : 0;

    if ($id == $_SESSION['id']) {
        ?>
        <h1>Mi cuenta</h1>
        <h2>Actualizar datos de cuenta</h2>
    <?php } else { ?>
        <h1>Usuarios</h1>
        <h2>Actualizar usuario</h2>
    <?php } ?>
</div>

<div class="container">
    <?php
    include "./inc/btn_back.php";

    // Verificar si la función conexion() está definida y $id es válido
    if (function_exists('conexion') && $id != 0) {
        $check_usuario = conexion()->query("SELECT * FROM usuario WHERE usuario_id='$id'");

        if ($check_usuario && $check_usuario->rowCount() > 0) {
            $datos = $check_usuario->fetch();
            ?>

            <div class="form-rest"></div>

            <form action="./php/usuario_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off">

                <input type="hidden" name="usuario_id" value="<?php echo $datos['usuario_id']; ?>" required>

                <div class="row">
                    <div class="form-group">
                        <label for="usuario_nombre">Nombres</label>
                        <input type="text" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40"
                               required value="<?php echo $datos['usuario_nombre']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="usuario_apellido">Apellidos</label>
                        <input type="text" name="usuario_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40"
                               required value="<?php echo $datos['usuario_apellido']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="usuario_usuario">Usuario</label>
                        <input type="text" name="usuario_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required
                               value="<?php echo $datos['usuario_usuario']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="usuario_email">Email</label>
                        <input type="email" name="usuario_email" maxlength="70"
                               value="<?php echo $datos['usuario_email']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="usuario_clave_1">Nueva Clave</label>
                        <input type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100">
                    </div>

                    <div class="form-group">
                        <label for="usuario_clave_2">Repetir Nueva Clave</label>
                        <input type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="administrador_usuario">Usuario Administrador</label>
                        <input type="text" name="administrador_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
                    </div>

                    <div class="form-group">
                        <label for="administrador_clave">Clave Administrador</label>
                        <input type="password" name="administrador_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
                    </div>
                </div>

                <div class="form-group has-text-centered">
                    <button type="submit" class="button">Actualizar</button>
                </div>

            </form>

            <?php
        } else {
            include "./inc/error_alert.php";
        }
        // Liberar recursos
        $check_usuario = null;
    } else {
        // Mostrar un mensaje de error si la función conexion() no está definida o $id no es válido
        include "./inc/error_alert.php";
    }
    ?>
</div>

</body>
</html>
