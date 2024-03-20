<body>
    <div class="wrapper">
        <?php include 'php/header.php'; ?>
        <?php include 'php/config.php'; ?>
        <?php include 'php/Carrito.php'; ?>
        <br>

        <?php if (!empty ($_SESSION['CARRITO'])) { ?>
            <section class="cart">
                <h2>CARRO DE COMPRAS</h2>
                <div class="cart-items">
                    <div class="item-details">
                        <div class="product-actions">
                            <span>Añade productos adicionales</span>
                            <a href="index.php" class="btn btn-danger btn-md">Añadir</a>
                        </div>
                        <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                            <div class="product">
                                <div class="product-image">
                                    <img src="<?= $producto['IMAGEN']; ?>" alt="Imagen del Producto">
                                </div>
                                <div class="product-details">
                                    <div class="product-info">
                                        <div class="info-title">Nombre del producto:</div>
                                        <h4 class="product-name">
                                            <?= $producto['NOMBRE']; ?>
                                        </h4>
                                    </div>
                                    <div class="product-info">
                                        <div class="info-title">Precio:</div>
                                        <span class="price">$
                                            <?= number_format($producto['PRECIO']) ?>
                                        </span>
                                    </div>
                                    <div class="product-actions">
                                        <div class="product-count">
                                            <span class="info-title">Cantidad:</span>
                                            <span class="count">
                                                <?= $producto['CANTIDAD'] ?>
                                            </span>
                                        </div>
                                    </div>
                                    <form class="delete-button" method="post">
                                        <input type="hidden" name="id" id="id"
                                            value="<?= openssl_encrypt($producto['ID'], COD, KEY); ?>">
                                        <button class="delete-btn" type="submit" name="btnAccion"
                                            value="Eliminar">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="order-summary">
                        <div class="summary-details">
                            <h3>Resumen del pedido</h3>
                            <br>
                            <div class="total">
                                <span>Total</span>
                                <div class="total-price" id="totalPrice">$
                                    <?php include 'php/total.php' ?>
                                </div>
                            </div>

                            <button id="btnComprar" class="checkout-button" type="submit"
                                data-cart='<?php echo json_encode($_SESSION['CARRITO']); ?>'>¡CONTINUAR CON EL
                                PAGO!</button>
                            <div id="wallet_container"></div>
                        </div>
                        <div class="payment-methods">
                            <h4>MEDIOS DE PAGO</h4>
                            <div class="payment-icons">
                                <img src="https://mindlabs.media/wp-content/uploads/2017/08/Paypal-Logo.png" alt="PayPal">
                                <img src="https://logos-world.net/wp-content/uploads/2020/09/Mastercard-Symbol.jpg"
                                    alt="Mastercard">
                                <img src="https://registro.pse.com.co/PSEUserRegister/assets/logo-pse.png" alt="PSE">
                                <img src="https://th.bing.com/th/id/R.7e250120b66451e7bc0c836e841c4eb7?rik=JawYw1pB%2bg93RA&riu=http%3a%2f%2fwww.100franquicias.com.co%2fimagenes%2flogo_grande-Efectyjpg&ehk=QhidigFl9aqKq%2bfjLysbx0PKjz7rvrk%2bjWHCZdX0sUk%3d&risl=&pid=ImgRaw&r=0"
                                    alt="Efecty">
                            </div>
                            <br>
                            <div class="security-info">
                                <div class="security-icon"><span>Seguridad de pago</span></div>
                                <p class="payment-paragraph">
                                    Atomic store se compromete a proteger su información de pago y solo compartiremos la
                                    información de su tarjeta con nuestros proveedores de servicios de pago que han acordado
                                    proteger su información.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } else { ?>
            <section class="cart">
                <div class="alertas" role="alert">
                    <p>No hay productos dentro del carrito...</p>
                    <a href="index.php" class="volver-btn">Volver al Inicio</a>
                </div>
            </section>
        <?php } ?>
    </div>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script src="js/mercadoPago.js"></script>
    <?php include 'php/footer.php'; ?>
</body>