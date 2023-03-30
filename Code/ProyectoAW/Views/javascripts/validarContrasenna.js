function validatePassword() {

    let contrasenna = document.getElementById('contrasenna');
    let confirmarContrasenna = document.getElementById('confirmarContrasenna');

    if (contrasenna.value !== confirmarContrasenna.value) {
        confirmarContrasenna.setCustomValidity("Las contraseñas no coinciden");
    } else {
        confirmarContrasenna.setCustomValidity('');
    }
}

    // Agregar un listener para el evento "input" en el campo de confirmación de contraseña
    confirmarContrasenna.addEventListener('input', validatePassword);