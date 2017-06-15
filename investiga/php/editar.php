<?php

function FORM_editMiembro($datos) {

    foreach ($datos as $dato){
        echo "
         <form  id='registro' method=post action='./php/editarMiembro.php' onsubmit='return validar_miembro();' >
            <input type='hidden' name='email' value='{$dato["EMAIL"]}'/>
            <label>Nombre</label><input type='text' name='nombre' value='{$dato["NOMBRE"]}'><br>
            <label>Apellidos</label><input type='text' name='apellidos' value='{$dato["APELLIDOS"]}'><br>
            <label>Categoría</label><input type='text' name='categoria' value='{$dato["CATEGORIA"]}'><br>
            <label>Director de grupo</label><input type='radio' name='director' value='si'>Sí
            <input type='radio' name='director' value='no' checked>No<br>
            <label>Contraseña</label><input type='hidden' name='pass' value='{$dato["PASSWORD"]}'><br>
            <label>Telefono</label><input type='text' name='telefono' value='{$dato["TELEFONO"]}'><br>
            <label>Url personal</label><input type='url' name='url' value='{$dato["URL"]}'><br>
            <label>Departamento</label><input type='text' name='dep' value='{$dato["DEPARTAMENTO"]}'><br>
            <label>Centro</label><input type='text' name='centro' value='{$dato["CENTRO"]}'><br>
            <label>Universidad</label><input type='text' name='uni' value='{$dato["UNIVERSIDAD"]}'><br>
            <label>Direccion</label><input type='text' name='dir' value='{$dato["DIRECCION"]}'><br>
            <label>Administrador</label><input type='radio' name='admin' value='si'>Sí
            <input type='radio' name='admin' value='no'>No<br><br>
            <label>Bloqueado</label><input type='radio' name='block' value='si'>Sí
            <input type='radio' name='block' value='no'>No<br><br>
            <label>Miembro antiguo</label><input type='radio' name='old' value='si'>Sí
            <input type='radio' name='old' value='no'>No<br><br>
            <input type='submit' name='reg' value='Editar'>
        </form>
      ";
       
    }
}

function FORM_editProyecto($datos){
    foreach($datos as $dato){
        echo " <form  id='registro' method=post action='./php/editarProyecto.php'  >
            <label>Título</label><input type='text' name='tit' id='tit' value='{$dato["TITULO"]}'><br>
            <input type='hidden' name='codigo' id='codigo' value='{$dato["CODIGO"]}'><br>
            <label>Fecha comienzo</label><input type='date' class='fechas' name='fecha_com' value='{$dato["FECHA_COMIENZO"]}'><br>
            <label>Fecha fin</label><input type='date' name='fecha_fin' class='fechas' id='fecha_fin' value='{$dato["FECHA_FIN"]}'><br>
            <label>Entidades colaboradoras</label><input type='text' name='entidades' value='{$dato["ENTIDADES"]}'><br>
            <label>Cuantia concedida</label><input type='text' name='cuantia' value='{$dato["CUANTIA"]}'><br>
            <label>Url</label><input type='text' name='url' value='{$dato["URL"]}'><br>
            <label>Investigador principal</label><input type='text' name='inv_ppal' value='{$dato["INVESTIGADOR_PPAL"]}'><br>
            <label>Investigadores colaboradores</label><input type='text' name='inv_col' value='{$dato["COLABORADORES"]}'><br>
            <label>Descripción</label><textarea name='desc' value='{$dato["DESCRIPCION"]}'></textarea><br>
        
            <input type='submit' name='reg' value='Editar'>
             </form>
            ";
   
    }
}

function FORM_editPublicacion($datos){
    foreach($datos as $dato){
        echo"
        <form  id='registro' method=post action='./php/editarPublicacion.php'>
            <label>Título</label><input type='text' name='titulo' value='{$dato["TITULO"]}'><br>
            <input type='hidden' name='DOI' id='DOI' value='{$dato["DOI"]}'><br>
            <label>Autores</label><input type='text' name='autores' id='autores' value='{$dato["AUTORES"]}'><br>
            <label>Fecha</label><input type='date' name='fecha' class='fechas' id='fecha' value='{$dato["FECHA"]}'><br>
            <label>Abstract</label><textarea id='abstract' name='abstract' value='{$dato["ABSTRACT"]}'></textarea><br>
            <label>keywords</label><input type='text' name='keywords' id='keywords' value='{$dato["KEYWORDS"]}'><br>
            <label>URL</label><input type='text' name='url' id='url' value='{$dato["URL"]}'><br>
            <label>Proyecto</label><input type='text' name='proyecto' id='proyecto' value='{$dato["PROYECTO"]}'><br>
            <input type='submit' name='reg' value='Editar'>
    </form>";
        
   
    }
}

?>
