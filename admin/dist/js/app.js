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
    // Eliminar la clase "fade" del elemento que crea el plugin
    $("div.iconpicker-popover").removeClass('fade');


    $.getJSON('servicios-registrados.php', function(data){
        console.log(data);
        var fecha_registro=[];
        var cantidad_registro=[]; 

        for(var i=0; i< data.length; i++){
             fecha_registro[i]=data[i].fecha;
             cantidad_registro[i]=data[i].cantidad;
        }
      
         console.log(fecha_registro);
      
         console.log(cantidad_registro);

    var areaChartData = {
      labels  : fecha_registro,
      datasets: [
        {
          label               : 'Registrados',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : true,
          pointColor          : '#FFFFFF',
          pointStrokeColor    : '#FFFFFF',
          pointRadius         : '3',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#FFFFFF',
          data                : cantidad_registro
        }
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : true,
          }
        }]
      }
    }

    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    /* lineChartData.datasets[1].fill = false; */
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, { 
      type: 'line',
      data: lineChartData, 
      options: lineChartOptions
    })

  });

});