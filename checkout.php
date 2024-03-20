<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <div class="wrapper">
        <?php
        include 'php/config.php';
        include 'php/conexion.php';
        include 'php/Carrito.php';
        include 'php/Header.php';
        include 'php/check.php';
        ?>
        <br>
        <section class="cart">
            <h2>PAGO</h2>
            <div class="cart-items">
                <div class="item-details">
                    <form class="formulario" method="POST" autocomplete="off" action="php/check.php">
                        <div class="form-group">
                            <div class="form-content">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre">
                            </div>

                            <div class="form-content">

                                <label for="telefono">Telefono:</label>
                                <input type="tel" id="telefono" name="telefono">
                            </div>

                            <div class="form-content">
                                <label for="cedula">Cedula:</label>
                                <input type="text" id="cedula" name="cedula">
                            </div>

                            <div class="form-content">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email">
                            </div>

                            <div class="form-content">
                                <label for="direccion">Direccion:</label>
                                <input type="text" name="direccion" id="direccion">
                            </div>


                            <div class="form-content">
                                <label for="codigo">Codigo Postal:</label>
                                <input type="tel" id="codigo" name="codigo">
                            </div>

                            <div class="form-content">
                                <label for="pais">Pais:</label>
                                <select id="pais" name="pais">
                                    <option value="" selected disabled>Selecciona tu país</option>
                                    <!-- Resto de opciones de países -->
                                </select>
                            </div>

                            <div class="form-content">
                                <label for="estado">Estado/Departamento:</label>
                                <select id="estado" name="estado">
                                    <option value="" selected disabled>Selecciona tu estado/departamento</option>
                                    <!-- Opciones de estados cargadas dinámicamente -->
                                </select>
                            </div>

                            <div class="form-content">
                                <select id="ciudad" name="ciudad">
                                    <option value="" selected disabled>Selecciona una ciudad</option>
                                    <!-- Opciones de ciudades cargadas dinámicamente -->
                                </select>

                            </div>

                        </div>
                        <br>

                        <br>
                    </form>
                </div>
                <div class="order-summary">
                    <div class="summary-details">

                        <h4>MEDIOS DE PAGO</h4>
                        <div class="payment-icons">
                            <img src="https://mindlabs.media/wp-content/uploads/2017/08/Paypal-Logo.png" alt="PayPal">
                            <img src="https://logos-world.net/wp-content/uploads/2020/09/Mastercard-Symbol.jpg"
                                alt="Mastercard">
                            <img src="https://registro.pse.com.co/PSEUserRegister/assets/logo-pse.png" alt="PSE">
                            <img src="https://th.bing.com/th/id/R.7e250120b66451e7bc0c836e841c4eb7?rik=JawYw1pB%2bg93RA&riu=http%3a%2f%2fwww.100franquicias.com.co%2fimagenes%2flogo_grande-Efectyjpg&ehk=QhidigFl9aqKq%2bfjLysbx0PKjz7rvrk%2bjWHCZdX0sUk%3d&risl=&pid=ImgRaw&r=0"
                                alt="Efecty">
                        </div>
                        <button class="checkout-button" onclick="validarCampos()">Continuar compra</button>
                    </div>
                    <div class="payment-methods">

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

        <?php
        include 'php/footer.php';
        ?>
    </div>
    <script src="js/checkoutData.js"></script>
    <script src="js/ubication.js"></script>
</body>