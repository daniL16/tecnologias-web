function validar_miembro(){
    console.log("Validando formulario");
    
    
    if(document.getElementById("email").value.length == 0){
        alert("El campo email no puede ser vacío");
        return false;
    }
    if(document.getElementById("nombre").value.length == 0){
        alert("El campo nombre no puede ser vacío");
        return false;
    }
    if(document.getElementById("apellidos").value.length == 0){
        alert("El campo apellidos no puede ser vacío");
        return false;
    }
    
    if(document.getElementById("pass").value.length == 0){
        alert("Debe especificar una contraseña");
        return false;
    }
}