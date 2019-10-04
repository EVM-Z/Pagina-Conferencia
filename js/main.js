(function(){
    "use strict";

    var regalo=document.getElementById('regalo');

    document.addEventListener('DOMContentLoaded', function(){
        
        // Campos Datos de usuario
        var nombre=document.getElementById('nombre');
        var apellido=document.getElementById('apellido');
        var email=document.getElementById('email');

        // Campos pases
        var pase_dia=document.getElementById('pase_dia');
        var pase_dosdias=document.getElementById('pase_dosdias');
        var pase_completo=document.getElementById('pase_completo');

        // Botones y divs
        var calcular=document.getElementById('calcular');
        var errorDiv=document.getElementById('error');
        var botonRegistro=document.getElementById('btnRegistro');
        var resultado=document.getElementById('lista-productos');

        calcular.addEventListener('click', calcularMontos);

        function calcularMontos(event){
            event.preventDefault();
            if(regalo.value===''){
                alert("Debes de elegir un regalo");
                regalo.focus();
            }
            else{
                var boletosDia=pase_dia.value,
                boletos2dias=pase_dosdias.value,
                boletoCompleto=pase_completo.value;

                // Comprobacion de los botones
                // console.log("Boletos Dia: "+boletosDia);
                // console.log("Boletos 2 dias: "+boletos2dias);
                // console.log("Boletos Completos: "+boletoCompleto);

                var totalPagar=(boletosDia*30)+(boletos2dias*45)+(boletoCompleto*50);

                console.log(totalPagar)
            }
        }


    });
})();