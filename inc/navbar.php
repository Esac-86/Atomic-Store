<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php?vista=product_list">
            <img src="../img/logo.png" alt="Logo" width="100px" height="80">
        </a>
        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Productos</a>
                <div class="navbar-dropdown">
                    <a href="index.php?vista=product_new" class="navbar-item">Nuevo</a>
                    <a href="index.php?vista=product_list" class="navbar-item">Lista</a>
                    <a href="index.php?vista=product_search" class="navbar-item">Buscar</a>
                </div>
            </div>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a href="index.php?vista=user_update&user_id_up=<?php echo $_SESSION['id']; ?>" class="button is-primary ">
                        Mi cuenta
                    </a>
                    <a href="index.php?vista=logout" class="button is-link ">
                        Salir
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Estilos para la barra de navegación */
    .navbar {
        border-bottom: 1px solid #333;
    }

    /* Estilos para el logo */
    .navbar-brand img {
        margin-right: 20px;
    }

    /* Estilos para el botón de menú */
    .navbar-burger {
        color: #fff;
    }

    /* Estilos para los enlaces del menú */
    .navbar-link {
        color: #fff;
    }

    /* Estilos para el menú desplegable */
    .navbar-dropdown {
        background-color: #222;
    }

    /* Estilos para los enlaces del menú desplegable */
    .navbar-dropdown a.navbar-item {
        color: #fff;
    }

    /* Estilos para los botones personalizados */
    .buttons .button {
        margin-right: 10px;
    }

    /* Estilos para el botón Mi cuenta */
    .button.is-primary {
        background-color: #007bff;
    }

    .button.is-primary:hover {
        background-color: #0056b3;
    }

    /* Estilos para el botón Salir */
    .button.is-link {
        background-color: #dc3545;
    }

    .button.is-link:hover {
        background-color: #c82333;
    }
</style>
