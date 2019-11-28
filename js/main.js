(function() {
    "use strict";

    var regalo = document.getElementById('regalo');

    document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('mapa')) {
                // Ingresando el mapa al index
                var map = L.map('mapa').setView([21.197912, -86.839396], 10);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
                L.marker([21.197912, -86.839396]).addTo(map)
                    .bindPopup('Hola Mundo.<br> desde Cancun.')
                    .openPopup()
                    // Se muestra al pasar el mouse encima
                    .bindTooltip('Un mensaje por aqui')
                    .openTooltip();
            }



            // Campos Datos de usuario
            var nombre = document.getElementById('nombre');
            var apellido = document.getElementById('apellido');
            var email = document.getElementById('email');

            // Campos pases
            var pase_dia = document.getElementById('pase_dia');
            var pase_dosdias = document.getElementById('pase_dosdias');
            var pase_completo = document.getElementById('pase_completo');

            // Botones y divs
            var calcular = document.getElementById('calcular');
            var errorDiv = document.getElementById('error');
            var botonRegistro = document.getElementById('btnRegistro');
            var lista_productos = document.getElementById('lista-productos');
            var suma = document.getElementById('suma-total');
            var suma = document.getElementById('suma-total');
            var viernes = document.getElementById('viernes');
            var sabado = document.getElementById('sabado');
            var domingo = document.getElementById('domingo');

            // Extras
            var camisas = document.getElementById('camisa_evento');
            var etiquetas = document.getElementById('etiquetas');

            botonRegistro.disabled = true;


            if (document.getElementById('calcular')) {
                calcular.addEventListener('click', calcularMontos);
                // Blur devuelve el ultimo valor que se ingreso
                pase_dia.addEventListener('blur', mostrarDias);
                pase_dosdias.addEventListener('blur', mostrarDias);
                pase_completo.addEventListener('blur', mostrarDias);

                nombre.addEventListener('blur', validarCampos);
                apellido.addEventListener('blur', validarCampos);
                email.addEventListener('blur', validarCampos);

                email.addEventListener('blur', validarMail);

                function validarCampos() {
                    if (this.value == '') {
                        errorDiv.style.display = 'block';
                        errorDiv.innerHTML = "Este campo es obligatorio";
                        this.style.border = '1px solid red';
                        errorDiv.style.border = '1px solid red';
                    } else {
                        errorDiv.style.display = 'none';
                        this.style.border = '1px solid #cccccc';
                    }
                }

                function validarMail() {
                    // indexOf busca en un Array
                    // El indexOF devuelve un -1 en caso de que el caracter no este
                    if (this.value.indexOf("@") > -1) {
                        errorDiv.style.display = 'none';
                        this.style.border = '1px solid #cccccc';
                    } else {
                        errorDiv.style.display = 'block';
                        errorDiv.innerHTML = "Debe de tener formato de correo @";
                        this.style.border = '1px solid red';
                        errorDiv.style.border = '1px solid red';
                    }
                }

                function calcularMontos(event) {
                    event.preventDefault();
                    if (regalo.value === '') {
                        alert("Debes de elegir un regalo");
                        regalo.focus();
                    } else {
                        var boletosDia = parseInt(pase_dia.value, 10) || 0,
                            boletos2dias = parseInt(pase_dosdias.value, 10) || 0,
                            boletoCompleto = parseInt(pase_completo.value, 10) || 0,
                            cantCamisas = parseInt(camisas.value, 10) || 0,
                            cantEtiquetas = parseInt(etiquetas.value, 10) || 0;


                        var totalPagar = (boletosDia * 30) + (boletos2dias * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);

                        var listadoProductos = [];

                        if (boletosDia >= 1) {
                            listadoProductos.push(boletosDia + ' Pases por día');
                        }
                        if (boletos2dias >= 1) {
                            listadoProductos.push(boletos2dias + ' Pases por 2 días');
                        }
                        if (boletoCompleto >= 1) {
                            listadoProductos.push(boletoCompleto + ' Pases Completos');
                        }
                        if (cantCamisas >= 1) {
                            listadoProductos.push(cantCamisas + ' Camisas');
                        }
                        if (cantEtiquetas >= 1) {
                            listadoProductos.push(cantEtiquetas + ' Etiquetas')
                        }

                        lista_productos.style.display = "block";
                        lista_productos.innerHTML = '';
                        for (var i = 0; i < listadoProductos.length; i++) {
                            lista_productos.innerHTML += listadoProductos[i] + '<br/>';
                        }

                        suma.innerHTML = "$ " + totalPagar.toFixed(2);

                        botonRegistro.disabled = false;
                        document.getElementById('total_pedido').value = totalPagar;
                    }
                }

                function mostrarDias() {
                    var boletosDia = parseInt(pase_dia.value, 10) || 0,
                        boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
                        boletoCompleto = parseInt(pase_completo.value, 10) || 0;

                    var diasElegidos = [];

                    if (boletosDia > 0) {
                        diasElegidos.push('viernes');
                    } else {
                        viernes.style.display = 'none';
                    }
                    if (boletos2Dias > 0) {
                        diasElegidos.push('viernes', 'sabado');
                    } else {
                        viernes.style.display = 'none';
                        sabado.style.display = 'none';
                    }
                    if (boletoCompleto > 0) {
                        diasElegidos.push('viernes', 'sabado', 'domingo');
                    } else {
                        viernes.style.display = 'none';
                        sabado.style.display = 'none';
                        domingo.style.display = 'none';
                    }

                    for (var i = 0; i < diasElegidos.length; i++) {
                        document.getElementById(diasElegidos[i]).style.display = 'block';
                    }
                }
            }
        }) //DOM CONTENT LOADED
})();


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