function activarPaginador(limites) {
document.getElementById('pag_pri').addEventListener('click',
function() { limites.ini=0; limites.items=7;
cargarDatos(limites.ini,limites.items); } );
document.getElementById('pag_sig').addEventListener('click',
function() { limites.ini= (limites.ini+limites.items)>limites.numciudades
?
((limites.numciudades-1)-((limites.numciudades-1)%limites.items)) :
(limites.ini+limites.items );
cargarDatos(limites.ini,limites.items); } );
document.getElementById('pag_ant').addEventListener('click',
function() { limites.ini=limites.items>limites.ini ? 0 : (limites.ini-limites.items);
cargarDatos(limites.ini,limites.items); } );
document.getElementById('pag_ult').addEventListener('click',
function() { limites.ini=(limites.numciudades-1)-((limites.numciudades-1)%limites.items);
cargarDatos(limites.ini,limites.items); } );
}
function peticionAjax(url,callback,variables) {
    var obj = new XMLHttpRequest();
    obj.open("GET",url);
    obj.onreadystatechange = function() {
        if (obj.readyState===4 && obj.status===200) {
            try {
                callback(JSON.parse(obj.responseText),variables);
            } catch (e) {
                alert("Error: "+obj.responseText);
            }
        }
    };
    obj.send();
}

onload=function() {
var limites = {ini:0, items: 10, numciudades:-1};
peticionAjax("masDatos.php?maxitems=1", function(datos,lim) {
lim.numciudades = datos.numciudades;
activarPaginador(lim);
cargarDatos(lim.ini,lim.items);
},limites);
}