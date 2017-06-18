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

function activarPagina(n_pag){
 //donde se mostrará los registros
 tabla = document.getElementById('contenido');

 ajax=peticionAjax("list_log.php?pag="+n_pag);
 tabla.innerHTML = ajax.responseText;
 ajax.send(null);
}