function confirmDelete(deleteUrl) {
    Swal.fire({
        title: '¿Seguro que deseas eliminar?',
        text: "Esta acción no se puede deshacer.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, redirige a la URL de eliminación
            window.location.href = deleteUrl;
        }
    });
    // Devuelve false para evitar que el enlace se siga ejecutando
    return false;
}

//mensje de alerta cuando quieren eliminar un usuario activo
 function showAlert() {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'No puedes eliminar un usuario activo.',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Entendido'
    });
}

$(document).ready(function() {
    // Función para desvanecer los mensajes después de un tiempo
    function fadeOutMessages() {
        $(".alert").delay(2000).fadeOut(1000); // Espera 2 segundos y luego desvanece el mensaje en 1 segundo
    }

    // Llama a la función al cargar la página
    fadeOutMessages();
});