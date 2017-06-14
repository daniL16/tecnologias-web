<?php

function FORM_editMiembro($datos) {

    foreach ($datos as $dato){
        echo "
         <form  id='registro' method=post action='./php/editarMiembro.php' onsubmit='return validar_miembro();' >
            <input type='hidden' name='email' value='{$dato["EMAIL"]}'/>
            <label>Nombre</label><input type='text' name='nombre' value='{$dato["NOMBRE"]}'><br>
            <label>Apellidos</label><input type='text' name='apellidos' value='{$dato["APELLIDOS"]}'><br>
            <label>Categoría</label><input type='text' name='cat value='{$dato["CATEGORIA"]}'><br>
            <label>Director de grupo</label><input type='radio' name='director' value='si'>Sí
            <input type='radio' name='director' value='no' checked>No<br>
            <label>Contraseña</label><input type='hidden' name='pass' value='{$dato["PASSWORD"]}'><br>
            <label>Telefono</label><input type='text' name='telefono' value='{$dato["TELEFONO"]}'><br>
            <label>Url personal</label><input type='url' name='url' value='{$dato["URL"]}'><br>
            <label>Departamento</label><input type='text' name='dep' value='{$dato["DEPARTAMENTO"]}'><br>
            <label>Centro</label><input type='text' name='centro' value='{$dato["CENTRO"]}'><br>
            <label>Universidad</label><input type='text' name='uni' value='{$dato["UNIVERSIDAD"]}'><br>
            <label>Direccion</label><input type='text' name='dir' value='{$dato["DIRECCIÓN"]}'><br>
            <label>Administrador</label><input type='radio' name='admin' value='si'>Sí
            <input type='radio' name='admin' value='no'>No<br><br>
            <label>Bloqueado</label><input type='radio' name='director' value='si'>Sí
            <input type='radio' name='director' value='no'>No<br><br>
            <label>Miembro antiguo</label><input type='radio' name='director' value='si'>Sí
            <input type='radio' name='director' value='no'>No<br><br>
            <input type='submit' name='reg' value='Editar'>
        </form>
      ";
       
    }
}

?>
