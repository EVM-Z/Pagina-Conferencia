$(document).ready(function() {
    $('#crear-admin').on('submit', function(e) {
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
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    Swal.fire(
                        'OK',
                        'El usuario se creo correctamente',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Error',
                        'El usuario no se guardo',
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
            }
        });
    });
});