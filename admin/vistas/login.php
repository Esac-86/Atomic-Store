<style>
    body {
        height: auto;
        background-color: #424242;
        color: white;
    }

    p strong {
        color: white;
    }

    .main-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .box {
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 300px;
        margin: auto;
    }

    .title {
        color: #333;
        font-size: 1.5em;
        text-align: center;
        margin-bottom: 20px;
    }

    .field {
        margin-bottom: 20px;
    }

    label {
        color: #555;
        font-size: 1em;
        margin-bottom: 5px;
		display: flex;
		font-weight: bold;
        display: block;
    }

    .control {
        position: relative;
    }

    .input {
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 1em;
        padding: 8px;
        width: calc(100% - 18px);
    }

    .input:focus {
        outline: none;
        border-color: #007bff;
    }

    .password-toggle {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .button {
        background-color: rgb(58, 33, 103);
        border: none;
        border-radius: 4px;
        color: #fff;
        cursor: pointer;
        font-size: 1em;
        padding: 1px 20px;
		width: 100%;
        display: flex;
		justify-content: center;
		align-items: center;
		margin: auto;
        margin-top: 15px; 
        transition: background-color 0.3s ease;
    }

    .botones{
        display: flex;
        flex-direction: column;
        /* justify-content: space-evenly; */
    }

    .button:hover {
        background-color: rgb(80, 51, 135);
		color: white;
    }

    .has-text-centered {
        text-align: center;
    }

    .mb-4 {
        margin-bottom: 20px;
    }

    .mt-3 {
        margin-top: 15px;
    }

</style>

<div class="main-container">
    <form class="box login" action="" method="POST" autocomplete="off">
        <h5 class="title">Sistema de Inventario</h5>

        <div class="field">
            <label>Usuario</label>
            <div class="control">
                <input type="text" name="login_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required class="input">
            </div>
        </div>

        <div class="field">
            <label>Clave</label>
            <div class="control">
                <input type="password" name="login_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required class="input">
            </div>
        </div>

       <div class="botones">
            <p class="">
                <button type="submit" class="button">Iniciar sesión</button>
            </p>
                <a href=".././index.php" type="submit" class="button">Volver al Inicio<a>
            </p>
       </div>

        <?php
            if(isset($_POST['login_usuario']) && isset($_POST['login_clave'])){
                require_once "./php/main.php";
                require_once "./php/iniciar_sesion.php";
            }
        ?>
    </form>
</div>
