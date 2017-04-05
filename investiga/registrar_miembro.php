<html>
<head lang="es">
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "./css/estilos.css" />
    <link rel="stylesheet" type="text/css" href="./css/formularios.css"/>
    <title>Grupo de Investigación</title>
</head>
<body>
<?php include 'inc/header.php' ?>
<?php include 'inc/nav.php' ?>    
<article id="contenido">
        <form  id="registro" method=post action="./php/nuevoMiembro.php" onsubmit="" >
            <label>Nombre</label><input type="text" name="nombre"><br>
            <label>Apellidos</label><input type="text" name="apellidos"><br>
            <label>Categoría</label><input type="text" name="categoria"><br>
            <label>Director de grupo</label><input type="radio" name="director" value="si">Sí
  <input type="radio" name="director" value="no">No<br>
            <label>Email</label><input type="text" name="email"><br>
            <label>Contraseña</label><input type="password" name="pass"><br>
            <label>Telefono</label><input type="text" name="telefono"><br>
            <label>Url personal</label><input type="text" name="url"><br>
            <label>Departamento</label><input type="text" name="dep"><br>
            <label>Centro</label><input type="text" name="centro"><br>
            <label>Universidad</label><input type="text" name="uni"><br>
            <label>Direccion</label><input type="text" name="dir"><br>
            <label>Fotografia</label><input type="text" name="foto"><br>
            <input type="submit" name="reg" value="Nuevo miembro">
    </form>
        
    </article>
<?php include 'inc/footer.html'?>
</body>
</html>
   