<?php include 'inc/head.php' ?>
<body>
<?php 
    include 'inc/header.php';
    include 'inc/nav.php'; 
    require_once './php/db.php';
    
    if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autenticado'){
        
        $db = DB_conexion();
        $proyectos = DB_getProyectos($db);
        $miembros = DB_getMiembros($db);

        echo '<article id="contenido">
                <form  id="registro" method=post action="./php/nuevaPublicacion.php" onsubmit="return validar_fechas();">
                    <label>Título</label><input type="text" name="titulo"><br>
                    <label>DOI</label><input type="text" name="DOI" id="DOI"><br>
                    <label>Autores</label><select multiple name="autores" id="autores">';
        // Obtenemos la lista de posibles autores
        foreach($miembros as $miembro){
            echo "<option value={$miembro['EMAIL']}>{$miembro['NOMBRE']}{$miembro['APELLIDOS']}</option>";
        }
        echo '</select><br>  <label>Fecha</label><input type="date" id="fechas" name="fecha" id="fecha"><br>
                    <label>Abstract</label><textarea id="abstract" name="abstract"></textarea><br>
                    <label>keywords</label><input type="text" name="keywords" id="keywords"><br>
                    <label>URL</label><input type="text" name="url" id="url"><br>
                    <label>Proyecto</label><select name="proyecto" id="proyecto">';
        // Obtenemos la lista de proyectos existentes
        foreach($proyectos as $proyecto){
            echo "<option value={$proyecto[ 'CODIGO']}> {$proyecto[ 'TITULO']}</option>";
        }
        echo '</select><br>
                <input type="submit" name="reg" value="Nueva publicacion">
                </form>
                </article>';
    }
else include 'inc/error.html' ?>
<?php include 'inc/footer.html'?>
</body>
</html>