<?php
include 'php/config.php';
include 'php/conexion.php';
include 'php/Carrito.php';
include 'php/header.php';
?>

<?php
$ID = isset($_GET['ID']) ? $_GET['ID'] : '';

$token = isset($_GET['token']) ? $_GET['token'] : '';


if ($ID == '' || $token == '') {
    echo '<h2 class="text-center"><span style="color: white; align-items">Error en la muestra de productos</span></h2>';
    exit;
} else {
    $token_tmp = hash_hmac('sha1', $ID, KEY_TOKEN);
    if ($token == $token_tmp) {

        $sentencia = $pdo->prepare("SELECT count(id) FROM `tblproductos` WHERE id=?");
        $sentencia->execute([$ID]);

        if ($sentencia->fetchColumn() > 0) {

            $sentencia = $pdo->prepare("SELECT Nombre, Descripcion, Precio, Imagen FROM `tblproductos` WHERE id=? LIMIT 1");
            $sentencia->execute([$ID]);
            $producto = $sentencia->fetch(PDO::FETCH_ASSOC);
        }
    } else {
        echo '<h2 class="text-center"><span style="color: white;">Error en la muestra de productos</span></h2>';
        exit;
    }
}


?>


<main>
    <br>
    <?php if ($mensaje != "") { ?>
    
        <div class="alert alert-success" role="alert">
            <?php echo ($mensaje); ?>
            <a href="shop-cart.php" class="badge badge-success">Ver Carrito</a>
        </div>
    
    <?php  } ?>
    <div class="container">
        <div class="col border border-4 p-4 is-bordered">
            
            <div class="col">
                <img class="producto_img" src="<?php echo $producto['Imagen']; ?>" alt="">
            </div>
            <div class="p-0">
                <br>
                <h2><span class="colors"><?php echo $producto['Nombre']; ?></span></h2>
                <h3><span class="color">$<?php echo number_format($producto['Precio']); ?></span></h3><br>
                <span class="col">Descripcion:</span><br>
                    <p class="lead">
                        <span class="colors description-short"><?php echo substr($producto['Descripcion'], 0, 200); ?>...</span>
                        <span class="colors description-full" style="display:none;"><?php echo $producto['Descripcion']; ?></span>
                        <br>
                        <a href="#" class="read-more">Ver más</a>
                        <a href="#" class="read-less" style="display:none;">Ver menos</a>
                    </p>

                <div class="d-grid mx-auto">
                    <br><br>
                    <form action="" method="POST">

                        <input type="hidden" name="product_id" value="<?= $ID; ?>">

                        <input type="hidden" name="product_img" id="product_img" value="<?= $producto['Imagen']; ?>">
                        <input type="hidden" name="product_nombre" id="product_nombre" value="<?= ($producto['Nombre']); ?>">
                        <input type="hidden" name="product_precio" id="product_precio" value="<?= ($producto['Precio']); ?>">
                        <input type="hidden" name="product_cantidad" id="product_cantidad" value="<?= (1); ?>">

                        <div class="buttons">
                            <button class="btn btn-danger " name="btnDetalle" value="Detalle " type="submit" style="width: 100%;">Agregar al Carrito</button>
                            <a class="btn btn-outline-dark " href="index.php" action="index.php" style="width: 100%;"><-- Regresar al Inicio</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
</main>


<?php
include './php/footer.php'
?>