!function(){var I=document.getElementById("regalo");document.addEventListener("DOMContentLoaded",function(){var e;document.getElementById("mapa")&&(e=L.map("mapa").setView([21.197912,-86.839396],10),L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",{attribution:'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(e),L.marker([21.197912,-86.839396]).addTo(e).bindPopup("Hola Mundo.<br> desde Cancun.").openPopup().bindTooltip("Un mensaje por aqui").openTooltip());var t=document.getElementById("nombre"),n=document.getElementById("apellido"),d=document.getElementById("email"),i=document.getElementById("pase_dia"),u=document.getElementById("pase_dosdias"),p=document.getElementById("pase_completo"),a=document.getElementById("calcular"),o=document.getElementById("error"),m=document.getElementById("btnRegistro"),c=document.getElementById("lista-productos"),y=document.getElementById("suma-total"),y=document.getElementById("suma-total"),l=document.getElementById("viernes"),s=document.getElementById("sabado"),r=document.getElementById("domingo"),g=document.getElementById("camisa_evento"),v=document.getElementById("etiquetas");function E(){""==this.value?(o.style.display="block",o.innerHTML="Este campo es obligatorio",this.style.border="1px solid red",o.style.border="1px solid red"):(o.style.display="none",this.style.border="1px solid #cccccc")}function b(){var e=parseInt(i.value,10)||0,t=parseInt(u.value,10)||0,n=parseInt(p.value,10)||0,d=[];0<e?d.push("viernes"):l.style.display="none",0<t?d.push("viernes","sabado"):(l.style.display="none",s.style.display="none"),0<n?d.push("viernes","sabado","domingo"):(l.style.display="none",s.style.display="none",r.style.display="none");for(var a=0;a<d.length;a++)document.getElementById(d[a]).style.display="block"}m.disabled=!0,document.getElementById("calcular")&&(a.addEventListener("click",function(e){if(e.preventDefault(),""===I.value)alert("Debes de elegir un regalo"),I.focus();else{var t=parseInt(i.value,10)||0,n=parseInt(u.value,10)||0,d=parseInt(p.value,10)||0,a=parseInt(g.value,10)||0,o=parseInt(v.value,10)||0,l=30*t+45*n+50*d+10*a*.93+2*o,s=[];1<=t&&s.push(t+" Pases por día"),1<=n&&s.push(n+" Pases por 2 días"),1<=d&&s.push(d+" Pases Completos"),1<=a&&s.push(a+" Camisas"),1<=o&&s.push(o+" Etiquetas"),c.style.display="block",c.innerHTML="";for(var r=0;r<s.length;r++)c.innerHTML+=s[r]+"<br/>";y.innerHTML="$ "+l.toFixed(2),m.disabled=!1,document.getElementById("total_pedido").value=l}}),i.addEventListener("blur",b),u.addEventListener("blur",b),p.addEventListener("blur",b),t.addEventListener("blur",E),n.addEventListener("blur",E),d.addEventListener("blur",E),d.addEventListener("blur",function(){-1<this.value.indexOf("@")?(o.style.display="none",this.style.border="1px solid #cccccc"):(o.style.display="block",o.innerHTML="Debe de tener formato de correo @",this.style.border="1px solid red",o.style.border="1px solid red")}),0<document.getElementsByClassName("editar-registrado").length&&(i.value||u.value||p.value)&&b())})}();