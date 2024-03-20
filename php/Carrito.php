<?php

session_start();

$mensaje = "";
$IMAGEN = 'IMAGEN';

if (isset($_POST['btnAccion'])) {
    if (isset($_POST['imagen'])) {
        $IMAGEN = $_POST['imagen'];
    }
    switch ($_POST['btnAccion']) {
        case 'Agregar':
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
            } else {
                $mensaje .= "ID Incorrecto: " . $ID . "<br/>";
            }
            if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
                $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
                $mensaje .= "Nombre: " . $NOMBRE . " ";
            } else {
                $mensaje .= "Nombre Incorrecto" . "<br/>";
                break;
            }
            if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
                $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);
                $mensaje .= "(" . $CANTIDAD . ")" . "<br/>";
            } else {
                $mensaje .= "Cantidad Incorrecto" . "<br/>";
                break;
            }
            if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
                $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
                $mensaje .= "Precio: " . $PRECIO . "<br/>";
            } else {
                $mensaje .= "Precio Incorrecto" . "<br/>";
                break;
            }

            if (!isset($_SESSION['CARRITO'])) {
                $producto = array(                 
                    'ID' => $ID,
                    'IMAGEN' => $IMAGEN,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO
                );
                $_SESSION['CARRITO'][0] = $producto;
                $mensaje = "Producto Agregado al Carrito";
            } else {
                $encontrado = false;

                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    if ($producto['ID'] == $ID) {
                        $_SESSION['CARRITO'][$indice]['CANTIDAD'] += $CANTIDAD;
                        $encontrado = true;
                        break;
                    }
                }

                if (!$encontrado) {
                    $numeroProductos = count($_SESSION['CARRITO']);
                    $producto = array(
                        'ID' => $ID,
                        'IMAGEN' => $IMAGEN,
                        'NOMBRE' => $NOMBRE,
                        'CANTIDAD' => $CANTIDAD,
                        'PRECIO' => $PRECIO
                    );
                    $_SESSION['CARRITO'][$numeroProductos] = $producto;
                }

                $mensaje = "Producto Agregado al Carrito";
            }
            break;

            case 'Eliminar':
                if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                    $ID = openssl_decrypt($_POST['id'], COD, KEY);
            
                    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                        if ($producto['ID'] == $ID) {
                            $_SESSION['CARRITO'][$indice]['CANTIDAD'] -= 1;
                            if ($_SESSION['CARRITO'][$indice]['CANTIDAD'] <= 0) {
                                unset($_SESSION['CARRITO'][$indice]);
                                // Reindexar el array después de eliminar el producto
                                $_SESSION['CARRITO'] = array_values($_SESSION['CARRITO']);
                            }
                            break;
                        }
                    }
                }
            break;
            
    }
}



if (isset($_POST['btnDetalle'])) {
    $ID = $_POST['product_id'];
    $IMAGEN = $_POST['product_img'];
    $nombre = $_POST['product_nombre'];
    $precio = $_POST['product_precio'];
    $CANTIDAD = $_POST['product_cantidad'];

    if (!isset($_SESSION['CARRITO'])) {
        $_SESSION['CARRITO'] = array();
    }

    $productoEncontrado = false;

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        if ($producto['ID'] == $ID) {
            $_SESSION['CARRITO'][$indice]['CANTIDAD'] += $CANTIDAD;
            $productoEncontrado = true;

            if ($_SESSION['CARRITO'][$indice]['CANTIDAD'] <= 0) {
                unset($_SESSION['CARRITO'][$indice]);
            }

            break;
        }
    }

    if (!$productoEncontrado) {
        $producto = array(
            'ID' => $ID,
            'IMAGEN' => $IMAGEN,
            'NOMBRE' => $nombre,
            'CANTIDAD' => $CANTIDAD,
            'PRECIO' => $precio
        );
        $_SESSION['CARRITO'][] = $producto;
    }

    $mensaje = "Producto agregado al carrito";

}

