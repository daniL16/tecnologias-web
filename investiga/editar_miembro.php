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
    <!-- Esto hay que rellenarlo (¿AJAX?)-->
        <form  id="registro" method=post action="" onsubmit="return validar_miembro();" >
            <label>Email</label><input type="text" name="email"><br>
            <label>Nombre</label><input type="text" name="nombre"><br>
            <label>Apellidos</label><input type="text" name="apellidos"><br>
            <label>Categoría</label><input type="text" name="cat"><br>
            <label>Director de grupo</label><input type="radio" name="director" value="si">Sí
  <input type="radio" name="director" value="no" checked>No<br>
            
            <label>Contraseña</label><input type="password" name="pass"><br>
            <label>Telefono</label><input type="text" name="telefono"><br>
            <label>Url personal</label><input type="url" name="url"><br>
            <label>Departamento</label><input type="text" name="dep"><br>
            <label>Centro</label><input type="text" name="centro"><br>
            <label>Universidad</label><input type="text" name="uni"><br>
            <label>Direccion</label><input type="text" name="dir"><br>
            <!-- Lo suyo seria que si eres admin te salga esto-->
            <label>Administrador</label><input type="radio" name="director" value="si">Sí
  <input type="radio" name="director" value="no">No<br><br>
            <label>Bloqueado</label><input type="radio" name="director" value="si">Sí
  <input type="radio" name="director" value="no">No<br><br>
            <label>Miembro antiguo</label><input type="radio" name="director" value="si">Sí
  <input type="radio" name="director" value="no">No<br><br>
            <input type="submit" name="reg" value="Editar">
    </form>
        
    </article>
<?php include 'inc/footer.html'?>
</body>
</html>
   