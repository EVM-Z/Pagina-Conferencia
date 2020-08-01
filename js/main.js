$(function() {
    // Letering (http://letteringjs.com/)
    $('.nombre-sitio').lettering();

    // Agregar clase al menu
    $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
    $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');


    // Menu fijo
    // Muestra la altura de la ventana
    var windowHeight = $(window).height();
    var barraAltura = $('.barra').innerHeight();

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll > windowHeight) {
            $('.barra').addClass('fixed');
            $('body').css({ 'margin-top': barraAltura + 'px' });
        } else {
            $('.barra').removeClass('fixed');
            $('body').css({ 'margin-top': '0px' });
        }
    });


    // Menu Responsive
    $('.menu-movil').on('click', function() {
        $('.navegacion-principal').slideToggle();
    });



    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        // Mostramos los pixeles que abarca toda la pagina
        // console.log(scroll);
    });


    // Programa de conferencia
    // Solo muestra el primer hijo, solo los talleres
    $('.programa-evento .info-curso:first').show();
    // Se agrega el primer elemento la clase activo por defecto
    $('.menu-programa a:first').addClass('activo');
    $('.menu-programa a').on('click', function() {
        // Removemos la clase activo de los elementos HTML
        $('.menu-programa a').removeClass('activo');
        // Se agrega la clase activo a los elemento en HTML
        $(this).addClass('activo');
        // Oculta las secciones que no se le dio click
        $('.ocultar').hide();
        // Muestra las demas secciones / conferencias y seminarios
        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);
        // Evitamos el pequeño salto de pagina
        return false;
    });

    // Animaciones para los numeros
    // nth-child agarra el valor de los elementos de acuerdo a su orden 1,2,3...
    // El 6, es el numero que vamos a animar
    // 1200 es el tiempo que tarda la animacion

    var resumenLista = jQuery('.resumen-evento');
    if (resumenLista.length > 0) {
        $('.resumen-evento').waypoint(function() {
            $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 }, 1200);
            $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15 }, 1200);
            $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3 }, 1500);
            $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 9 }, 1500);
        });
    }


    // Cuenta regresiva
    // La fecha que se pone, es el parametro para saber cuando falta para llegar a dicha fecha
    $('.cuenta-regresiva').countdown('2020/01/27 12:00:00', function(event) {
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });


    $('.invitado-info').colorbox({ inline: true, width: "50%" });

    // Ventana al registro newsletter
    $('.boton_newsletter').colorbox({ inline: true, width: "50%" });

});