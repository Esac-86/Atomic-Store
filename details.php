<?php 
    include 'php/config.php';
    include 'php/conexion.php';
    include 'php/Carrito.php'; 
    include 'php/header.php';
?>
<link rel="stylesheet" href="css/details.css">
<body>
    <div class="wrapper">
        <?php
        $ID = isset($_GET['ID']) ? $_GET['ID'] : '';
        $token = isset($_GET['token']) ? $_GET['token'] : '';

        if ($ID == '' || $token == '') {
            echo '<div class="error-message">Error en la muestra de productos</div>';
            exit;
        } else {
            $token_tmp = hash_hmac('sha1', $ID, KEY_TOKEN);
            if ($token != $token_tmp) {
                echo '<div class="error-message">Error en la muestra de productos</div>';
                exit;
            }

            $sentencia = $pdo->prepare("SELECT Nombre, Descripcion, Precio, Imagen FROM tblproductos WHERE id=? LIMIT 1");
            $sentencia->execute([$ID]);
            $producto = $sentencia->fetch(PDO::FETCH_ASSOC);
        }
        ?>

<main>
    <div class="main-container">
        <?php if ($mensaje != ""): ?>
            <div class="alert success-message">
                <div class="alert-message">
                    <?php echo $mensaje; ?>
                </div>
                <a href="http://localhost/atomicstore/shop-cart.php" class="badge">Ver Carrito</a>
            </div>
        <?php endif; ?>
        <div class="product-details-container">
            <div class="product-image">
                <img src="<?php echo $producto['Imagen']; ?>" alt="<?php echo $producto['Nombre']; ?>">
            </div>
            <div class="product-details">
                <div class="product-info">
                    <h2><?php echo $producto['Nombre']; ?></h2>
                    <h3>$<?php echo number_format($producto['Precio']); ?></h3>
                    <p class="description"><?php echo $producto['Descripcion']; ?></p>
                    <p class="full-description" style="display:none;"><?php echo $producto['Descripcion']; ?></p>
                </div>
                <div class="buttons">
                    <form action="" method="POST">
                        <input type="hidden" name="product_id" value="<?= $ID; ?>">
                        <input type="hidden" name="product_img" id="product_img" value="<?= $producto['Imagen']; ?>">
                        <input type="hidden" name="product_nombre" id="product_nombre" value="<?= htmlspecialchars($producto['Nombre']); ?>">
                        <input type="hidden" name="product_precio" id="product_precio" value="<?= $producto['Precio']; ?>">
                        <input type="hidden" name="product_cantidad" id="product_cantidad" value="1">
                        <button class="mas" name="btnDetalle" value="Detalle" type="submit">Agregar al Carrito</button>
                        <a class="btn" href="index.php">← Regresar al Inicio</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include './php/footer.php'; ?>
</body>
</html>