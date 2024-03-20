<p class="has-text-right pt-4 pb-4">
    <a href="#" class="btn-back">
        <- Regresar atrás
    </a>
</p>

<style>
    /* Estilos para el botón de regresar */
    .btn-back {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #0056b3;
    }
</style>



<script type="text/javascript">
    let btn_back = document.querySelector(".btn-back");

    btn_back.addEventListener('click', function(e){
        e.preventDefault();
        window.history.back();
    });
</script>