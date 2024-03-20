<link rel="stylesheet" href="./css/index.css">

<?php
include 'php/config.php';
include 'php/conexion.php';
include 'php/Carrito.php';
include 'php/header.php';
?>
<div class="banner">

</div>
<br><br>
<div class="contenedor">
    <?php if ($mensaje != "") { ?>
        <div class="alert">
            <div class="alert-message">
                <?= $mensaje; ?>
            </div>
            <a href="shop-cart.php" class="badge">Ver Carrito</a>
        </div>
    <?php } ?>

    <div class="row">
        <?php
        $sentencia = $pdo->prepare("SELECT * FROM tblproductos");
        $sentencia->execute();
        $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach ($listaProductos as $producto) { ?>
            <div class="product-card">
                <img title="<?= $producto['Nombre']; ?>" alt="Titulo" class="product-img-top"
                    src="<?= $producto['Imagen']; ?>">
                <div class="product-body">
                    <span>
                        <?= $producto['Nombre']; ?>
                    </span>
                    <h5 class="product-title price">$
                        <?= number_format($producto['Precio']); ?> COP
                    </h5>
                    <form method="post" action="">
                        <input type="hidden" name="id" id="id" value="<?= openssl_encrypt($producto['ID'], COD, KEY); ?>">
                        <input type="hidden" name="nombre" id="nombre"
                            value="<?= openssl_encrypt($producto['Nombre'], COD, KEY); ?>">
                        <input type="hidden" name="imagen" id="imagen" value="<?= $producto['Imagen']; ?>">
                        <input type="hidden" name="precio" id="precio"
                            value="<?= openssl_encrypt($producto['Precio'], COD, KEY); ?>">
                        <input type="hidden" name="cantidad" id="cantidad" value="<?= openssl_encrypt(1, COD, KEY); ?>">
                        <div class="product-container">
                            <button class=" btn btn-add-to-cart" name="btnAccion" value="Agregar" type="submit">Agregar al
                                Carrito</button>
                            <a class="btn btn-details"
                                href="details.php?ID=<?= $producto['ID']; ?>&token=<?= hash_hmac('sha1', $producto['ID'], KEY_TOKEN); ?>"
                                role="button">Ver más detalles</a>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<br><br>

<?php
include 'php/footer.php'
    ?>