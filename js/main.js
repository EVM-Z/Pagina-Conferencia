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
        var lista_productos=document.getElementById('lista-productos');

        // Extras
        var camisas=document.getElementById('camisa_evento')
        var etiquetas=document.getElementById('etiquetas');

        calcular.addEventListener('click', calcularMontos);

        function calcularMontos(event){
            event.preventDefault();
            if(regalo.value===''){
                alert("Debes de elegir un regalo");
                regalo.focus();
            }
            else{
                var boletosDia=parseInt(pase_dia.value)||0,
                boletos2dias=parseInt(pase_dosdias.value)||0,
                boletoCompleto=parseInt(pase_completo.value)||0,
                cantCamisas=parseInt(camisas.value)||0,
                cantEtiquetas=parseInt(etiquetas.value)||0;

                // Comprobacion de los botones
                // console.log("Boletos Dia: "+boletosDia);
                // console.log("Boletos 2 dias: "+boletos2dias);
                // console.log("Boletos Completos: "+boletoCompleto);

                var totalPagar=(boletosDia*30)+(boletos2dias*45)+(boletoCompleto*50)+((cantCamisas*10)*.93)+(cantEtiquetas*2);

                var listadoProductos=[];

                if(boletosDia >= 1){
                    listadoProductos.push(boletosDia + ' Pases por día');
                }
                if(boletos2dias >= 1){
                    listadoProductos.push(boletos2dias + ' Pases por 2 días');
                }
                if(boletoCompleto >= 1){
                    listadoProductos.push(boletoCompleto + ' Pases Completos');
                }
                if(cantCamisas >= 1){
                    listadoProductos.push(cantCamisas + ' Camisas');
                }
                if(cantEtiquetas >= 1){
                    listadoProductos.push(cantEtiquetas + ' Etiquetas')
                }

                lista_productos.innerHTML='';
                for(var i=0; i<listadoProductos.length; i++){
                    lista_productos.innerHTML += listadoProductos[i] + '<br/>';
                }
            }
        }


    });
})();