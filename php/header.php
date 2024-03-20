<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/shop-cart.css">
    <link rel="stylesheet" href="css/checkout.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="shortcut icon" href="img/banner++++/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Atomic Store</title>
</head>
<!-- bg-dark trext-white -->
<body style="background-color:  rgb(48, 48, 48); ">
    <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> -->
    <nav class="general">
        <a href="index.php" class="imagen"><img src="img/banner++++/logo.png" alt="" width="200px"> </a>
        <div class="item">
            <ul class="navbar">
                <!-- <li class="nav-item-active">
                    <a class="nav-link"><img src="img/banner++++/icons8-lupa-64.png" width="25"" alt=""></a>
                </li> -->
                
                    <a class="nav-link" href="shop-cart.php"><img src="img/banner++++/icons8-carrito-de-compras-64.png" alt="">
                        (<?php
                            $totalProductosCarrito = 0;

                            if (isset($_SESSION['CARRITO'])) {
                                foreach ($_SESSION['CARRITO'] as $producto) {
                                    // Verifica si la clave 'CANTIDAD' está definida antes de acceder a ella
                                    if (isset($producto['CANTIDAD'])) {
                                        $totalProductosCarrito += $producto['CANTIDAD'];
                                    }
                                }
                            }

                            echo $totalProductosCarrito;
                            ?>)
                    </a>
              
                    <a class="nav-link" href="admin/index.php" target="blank"><img src="img/banner++++/icons8-administrador-96 (1).png" alt="" width="40px"></a>
                
            </ul>
        </div>
    </nav>