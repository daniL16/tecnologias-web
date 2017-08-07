<?php


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
