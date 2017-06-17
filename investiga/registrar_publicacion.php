<?php include 'inc/head.php' ?>
<body>
<?php include 'inc/header.php' ?>
<?php include 'inc/nav.php' ?>    
<article id="contenido">
        <form  id="registro" method=post action="./php/nuevaPublicacion.php" onsubmit="return validar_fechas();">
            <label>Título</label><input type="text" name="titulo"><br>
            <label>DOI</label><input type="text" name="DOI" id="DOI"><br>
            <label>Autores</label><input type="text" name="autores" id="autores"><br>
            <label>Fecha</label><input type="date" id="fechas" name="fecha" id="fecha"><br>
            <label>Abstract</label><textarea id="abstract" name="abstract"></textarea><br>
            <label>keywords</label><input type="text" name="keywords" id="keywords"><br>
            <label>URL</label><input type="text" name="url" id="url"><br>
            <label>Proyecto</label><input type="text" name="proyecto" id="proyecto"><br>
            <input type="submit" name="reg" value="Nueva publicacion">
    </form>
        
    </article>
<?php include 'inc/footer.html'?>
</body>
</html>