<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['CARRITO']) && !empty($_SESSION['CARRITO'])) {
    echo '<ul>';
    
    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        echo '<li>' . $producto['NOMBRE'] . '</li>';
    }
    
    echo '</ul>';
} else {
    echo '<p>Tu carrito está vacío.</p>';
}
