function validar_miembro(){
    console.log("Validando formulario");
    
    // Email no vacio
    if(document.getElementById("email").value.length == 0){
        alert("El campo email no puede ser vacío");
        return false;
    }
    
    // Nombre no vacio
    if(document.getElementById("nombre").value.length == 0){
        alert("El campo nombre no puede ser vacío");
        return false;
    }
    
    // Apellidos no vacio
    if(document.getElementById("apellidos").value.length == 0){
        alert("El campo apellidos no puede ser vacío");
        return false;
    }
    
    // Se debe introducir una contraseña
    if(document.getElementById("pass").value.length == 0){
        alert("Debe especificar una contraseña");
        return false;
    }
}

function validar_fechas(){
    console.log("validando formulario");
    if(document.getElementById("fechas").value.length == 0){
        alert("Las fechas deben ser introducidas en el formato: aaaa/mm/dd");
        return false;
    }
}