<?php
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $total = 0;

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']);
    }

    echo number_format("$total")
?>



