(function() {
    'use strict';

    var regalo = document.getElementById('regalo');

    document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('mapa')) {
                // MAP
                var map = L.map('mapa').setView([37.372468, -6.0711], 17);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                L.marker([37.372468, -6.0711]).addTo(map)
                    .bindPopup('Socram <br> Web Design')
                    .openPopup()
                    .bindTooltip('Socram<br>webdesign')
                    .openTooltip();

            }
            // Campos datos usuarios
            var nombre = document.getElementById('nombre');
            var apellido = document.getElementById('apellido');
            var email = document.getElementById('email');


            // Campos tickets
            var pase_dia = document.getElementById('pase_dia');
            var pase_dosdias = document.getElementById('pase_dosdias');
            var pase_completo = document.getElementById('pase_completo');

            // Botones y Divs
            var calcular = document.getElementById('calcular');
            var errorDiv = document.getElementById('error');
            var botonRegistro = document.getElementById('btnRegistro');
            var lista_productos = document.getElementById('lista-productos');
            var suma = document.getElementById('suma-total');
            var viernes = document.getElementById('viernes');
            var sabado = document.getElementById('sabado');
            var domingo = document.getElementById('domingo');

            // Extras
            var camisas = document.getElementById('camisa_evento');
            var etiquetas = document.getElementById('etiquetas');

            if (document.getElementById('calcular')) {
                calcular.addEventListener('click', calcularMontos);
                pase_dia.addEventListener('click', mostrarDias);
                pase_dosdias.addEventListener('blur', mostrarDias);
                pase_completo.addEventListener('blur', mostrarDias);

                nombre.addEventListener('blur', validarCampos);
                apellido.addEventListener('blur', validarCampos);
                email.addEventListener('blur', validarCampos);
                email.addEventListener('blur', validarMail);

                function validarMail() {
                    if (this.value.indexOf('@') > -1) {
                        errorDiv.style.display = 'none';
                        this.style.border = '1px solid #ccc';
                    } else {
                        errorDiv.style.display = 'block';
                        errorDiv.innerHTML = 'Debe ser como el ejemplo: ejemplo@dominio.com';
                        this.style.border = '1px solid red';
                        errorDiv.style.border = '1px solid red';
                    }
                }

                function validarCampos() {
                    if (this.value == '') {
                        errorDiv.style.display = 'block';
                        errorDiv.innerHTML = 'Este campo es obligatorio';
                        this.style.border = '1px solid red';
                        errorDiv.style.border = '1px solid red';
                    } else {
                        errorDiv.style.display = 'none';
                        this.style.border = '1px solid #ccc';
                    }
                }

                function calcularMontos(event) {
                    event.preventDefault();
                    if (regalo.value === '') {
                        alert('Debes elegir un regalo');
                        regalo.focus();
                    } else {
                        var boletosDia = parseInt(pase_dia.value, 10) || 0,
                            boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
                            boletoCompleto = parseInt(pase_completo.value, 10) || 0,
                            cantCamisas = parseInt(camisas.value, 10) || 0,
                            cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

                        var totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);

                        var listadoProductos = [];
                        if (boletosDia >= 1) {
                            listadoProductos.push(boletosDia + ' Pases por día');
                        }
                        if (boletos2Dias >= 1) {
                            listadoProductos.push(boletos2Dias + ' Pases por 2 días');
                        }
                        if (boletoCompleto >= 1) {
                            listadoProductos.push(boletoCompleto + ' Pases completos');
                        }
                        if (cantCamisas >= 1) {
                            listadoProductos.push(cantCamisas + ' Camisas');
                        }
                        if (cantEtiquetas >= 1) {
                            listadoProductos.push(cantEtiquetas + ' Etiquetas');
                        }

                        lista_productos.style.display = 'block';
                        lista_productos.innerHTML = '';
                        for (var i = 0; i < listadoProductos.length; i++) {
                            lista_productos.innerHTML += listadoProductos[i] + '<br>';
                        }

                        suma.innerHTML = totalPagar.toFixed(2) + ' €';
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
        }) // DOM CONTENT LOADED
})();

$(function() {
    // LETTERING (http://letteringjs.com/)
    $('.nombre-sitio').lettering();

    // AGREGAR CLASE A MENU
    $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
    $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');

    // MENU FIJO
    var windowHeight = $(window).height();
    var barraAltura = $('.barra').innerHeight();
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll > windowHeight) {
            $('.barra').addClass('fixed');
            $('body').css({ 'margin-top': barraAltura + 'px' });
        } else {
            $('.barra').removeClass('fixed');
            $('body').css({ 'margin-top': "0px" });
        }
    });

    // MENU RESPONSIVE
    $('.menu-movil').on('click', function() {
        $('.navegacion-principal').slideToggle();
    });

    // PROGRAMA DE CONFERENCIAS
    $('div.ocultar').hide();
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');

    $('.menu-programa a').on('click', function() {
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();
        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);
        return false;
    });

    // ANIMACIONES PARA LOS NUMEROS (https://github.com/aishek/jquery-animateNumber)
    var resumenLista = jQuery('.resumen-evento');

    if (resumenLista.length > 0) {
        $('.resumen-evento').waypoint(function() {
            $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 }, 1200);
            $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15 }, 1200);
            $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3 }, 1500);
            $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 9 }, 1500);
        }, {
            offset: '60%'
        });
    }


    // CUENTA REGRESIVA (http://hilios.github.io/jQuery.countdown/)
    $('.cuenta-regresiva').countdown('2019/08/02 09:00:00', function(event) {
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

    // COLORBOX
    if ($('.invitado-info').length) {
        $('.invitado-info').colorbox({ inline: true, width: "50%" });
    }

});