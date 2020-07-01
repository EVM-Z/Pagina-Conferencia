$(function() {
    $("#registros").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        'language': {
            paginate: {
                next: 'Siguiente',
                previous: 'Anterior',
                last: 'Último',
                first: 'Primero'
            },
            info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
            emptyTable: 'No hay registros',
            infoEmpty: '0 Registros',
            search: 'Buscar: '
        }
    });

    // Deshabilitamos el boton
    $('#crear_registro_admin').attr('disabled', true);


    $('#repetir_password').on('input', function() {
        // Accedemos al valor que tenga dentro del input
        var password_nuevo = $('#password').val();

        var campo_password = $('#password');
        var campo_repetir_password = $('#repetir_password');

        campo_password.removeClass('is-invalid id-valid');
        campo_repetir_password.removeClass('id-valid is-invalid');
        $('#resultado_password').removeClass('valid-feedback invalid-feeback');

        // Password iguales
        if ($(this).val() == password_nuevo) {
            $('#resultado_password').text('Correcto');
            campo_password.addClass('is-valid');
            campo_repetir_password.addClass('is-valid');
            $('#resultado-password').addClass('valid-feedback');
            // Habilitamos el boton
            $('#crear_registro_admin').attr('disabled', false);

        } else {
            // Password distintas
            $('#resultado_password').text('Las contraseñas no son iguales');
            campo_password.addClass('is-invalid');
            campo_repetir_password.addClass('is-invalid');
            $('#resultado_password').addClass('invalid-feedback');

        }
    });

    // Categoria Seleccion
    $('.seleccionar').select2();

    // Fecha Evento
    $('#fecha').datetimepicker({
        format: 'L'
    });

    // Hora
    $('#timepicker').datetimepicker({
        format: 'LT'
    });

    // FontAwesome Iconos
    $('#icono').iconpicker();
    // Eliminar la clase "fade" del elemento que crea el Plugin
    $("div.iconpicker-popover").removeClass('fade');

});