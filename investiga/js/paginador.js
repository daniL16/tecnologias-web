
function activarPagina(n_pag){
 //donde se mostrará los registros
 var tabla = document.getElementById('contenido');
    
 var obj = new XMLHttpRequest();
 obj.open("GET","./php/list_log.php?pag="+n_pag);
 
 obj.onreadystatechange = function() {
        if (obj.readyState===4 && obj.status===200) {
            try {
                tabla.innerHTML = obj.responseText;
            } catch (e) {
                alert("Error: "+obj.responseText);
            }
        }
    }

 obj.send(null);
}