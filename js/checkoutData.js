function validarCampos() {


    var nombre = document.getElementById('nombre').value;
    var telefono = document.getElementById('telefono').value;
    var email = document.getElementById('email').value;
    var cedula = document.getElementById('cedula').value;
    var direccion = document.getElementById('direccion').value;
    var codigo = document.getElementById('codigo').value;

    // Expresiones regulares para validar los formatos de los campos
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var nombreRegex = /^[a-zA-Z\s]*$/;
    var telefonoRegex = /^\d+$/;
    var cedulaRegex = /^[0-9]+$/;
    var codigoRegex = /^\d+$/;

    // Verificar que todos los campos estén llenos y que cumplan con las validaciones
    if (nombre !== '' && telefono !== '' && email !== '' && direccion !== '' && ciudad !== '' && codigo !== '') {
        if (!emailRegex.test(email)) {
            // Mostrar una alerta de SweetAlert2 si el correo no es válido
            Swal.fire({
                icon: 'error',
                title: 'Ingrese un correo electrónico válido.',
            });
            return;
        }
        if (!nombreRegex.test(nombre)) {
            // Mostrar una alerta de SweetAlert2 si el nombre contiene números
            Swal.fire({
                icon: 'error',
                title: 'El campo nombre no admite números.',
            });
            return;
        }
        if (!telefonoRegex.test(telefono)) {
            // Mostrar una alerta de SweetAlert2 si el teléfono contiene letras
            Swal.fire({
                icon: 'error',
                title: 'El campo teléfono no admite letras.',
            });
            return;
        }
        if (!cedulaRegex.test(cedula)) {
            // Mostrar una alerta de SweetAlert2 si la cédula contiene letras
            Swal.fire({
                icon: 'error',
                title: 'El campo cédula no admite letras.',
            });
            return;
        }
        if (!codigoRegex.test(codigo)) {
            // Mostrar una alerta de SweetAlert2 si el código postal contiene letras
            Swal.fire({
                icon: 'error',
                title: 'El campo código postal no admite letras.',
            });
            return;
        }
        // Redirigir a shop-cart.php si todos los campos están llenos y son válidos
        window.location.href = 'shop-cart.php';
    } else {
        // Mostrar una alerta de SweetAlert2 si algún campo está vacío
        Swal.fire({
            icon: 'error',
            title: 'Completa todos los campos.',
        });
    }
}