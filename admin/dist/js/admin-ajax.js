$(document).ready(function() {
    $('#guardar-registro').on('submit', function(e) {
        // Evitamos que se habra el archivo insertar-admin.php desde el formulario crear-admin.php
        e.preventDefault();

        // Obtener los datos
        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    Swal.fire(
                        'OK',
                        'Se guardó correctamente',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Error',
                        'El usuario no se guardó',
                        'error'
                    )
                }
            }
        });
    });


    $('#login-admin').on('submit', function(e) {
        // Evitamos que se habra el archivo insertar-admin.php desde el formulario crear-admin.php
        e.preventDefault();
        // Obtener los datos
        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var resultado = data;

                if (resultado.respuesta == 'exitoso') {
                    Swal.fire(
                        'Login Correcto',
                        'Bievenid@ ' + resultado.usuario,
                        'success'
                    )

                    setTimeout(function() {
                        window.location.href = 'admin-area.php';
                    }, 2000);
                } else {
                    Swal.fire(
                        'Error',
                        'Usuario o Password Incorrecto',
                        'error'
                    )
                }
            }
        });
    });
});