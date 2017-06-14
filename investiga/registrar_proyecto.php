<html>
<head lang="es">
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "./css/estilos.css" />
    <link rel="stylesheet" type="text/css" href="./css/formularios.css"/>
    <script src="js/validacion.js"></script>
    <title>Grupo de Investigación</title>
</head>
<body>
<?php include 'inc/header.php' ?>
<?php include 'inc/nav.php' ?>    
<article id="contenido">
        <form  id="registro" method=post action="./php/nuevoProyecto.php" onsubmit="" >
            <label>Título</label><input type="text" name="tit" id="tit"><br>
            <label>Código</label><input type="text" name="codigo" id="codigo"><br>
            <label>Fecha comienzo</label><input type="date" name="fecha_com"><br>
            <label>Fecha fin</label><input type="date" name="fecha_fin" id="fecha_fin"><br>
            <label>Entidades colaboradoras</label><input type="text" name="entidades"><br>
            <label>Cuantia concedida</label><input type="text" name="cuantia"><br>
            <label>Url</label><input type="text" name="url"><br>
            <label>Investigador principal</label><input type="text" name="inv_ppal"><br>
            <label>Investigadores colaboradores</label><input type="text" name="inv_col"><br>
            <label>Descripción</label><textarea name="desc"></textarea><br>
        
            <input type="submit" name="reg" value="Nuevo proyecto">
    </form>
        
</article>
<?php include 'inc/footer.html'?>
</body>
</html>