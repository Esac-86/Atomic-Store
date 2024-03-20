<style>
    /* Estilos para el formulario de ingreso de productos */
    .product-form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .product-form {
        color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #333;
        max-width: 500px;
        width: 100%;
    }

    .product-form .form-control {
        margin-bottom: 20px;
    }

    .product-form label {
        font-weight: bold;
    }

    .product-form input,
    .product-form textarea {
        border-radius: 4px;
        border: 1px solid #ccc;
        padding: 8px;
        width: calc(100% - 20px); /* Subtracting padding */
    }

    .product-form .file-name {
        color: #adb5bd;
    }

    .product-form .button {
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    .product-form .button.is-info {
        background-color: #3a2167; /* Cambiado el color */
        color: white;
    }

    .product-form .button.is-info:hover {
        background-color: #291943; /* Cambiado el color */
    }
</style>

<div class="product-form-container">
    <div class="product-form">
        <?php require_once "./php/main.php"; ?>

        <div class="form-control mb-6 mt-6"></div>

        <form action="./php/producto_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
            <div class="form-control">
                <label>Nombre</label>
                <input class="input" type="text" name="Nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required>
            </div>

            <div class="form-control">
                <label>Precio</label>
                <input class="input" type="text" name="Precio" pattern="[0-9.]{1,25}" maxlength="25" required>
            </div>

            <div class="form-control">
                <label>Descripción</label>
                <textarea class="textarea" name="Descripcion" required></textarea>
            </div>

            <div class="form-control">
                <label>Imagen del producto</label><br>
                <div class="file is-small has-name">
                    <label class="file-label">
                        <input class="file-input" type="file" name="Imagen" accept=".jpg, .png, .jpeg">
                        <span class="file-cta">
                            <span class="file-label">Imagen</span>
                        </span>
                        <span class="file-name">JPG, JPEG, PNG. (Máximo 3MB)</span>
                    </label>
                </div>
            </div>

            <p class="has-text-centered">
                <button type="submit" class="button is-info is-rounded">Guardar</button>
            </p>
        </form>
    </div>
</div>
