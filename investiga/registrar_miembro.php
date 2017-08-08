<?php include 'inc/head.php' ?>

<body>
<?php 
    include 'inc/header.php';
    include 'inc/nav.php';
    if(isset($_SESSION['usuario']) and $_SESSION['admin']){
        echo '<article id="contenido">
          <form  id="registro" method=post action="./php/nuevoMiembro.php" onsubmit="return validar_miembro();"  enctype="multipart/form-data"  >
            <label>Nombre</label><input type="text" name="nombre" id="nombre" value="<?php if (
isset($_POST['nombre'])) echo $_POST['nombre']; ?>"><br>
            <label>Apellidos</label><input type="text" name="apellidos" id="apellidos" value="<?php if (
isset($_POST['apellidos'])) echo $_POST['apellidos']; ?>"><br>
            <label>Categoría</label><input type="text" name="categoria" id="categoria" value="<?php if (
isset($_POST['categoria'])) echo $_POST['categoria']; ?>"><br>
            <label>Director de grupo</label><input type="radio" name="director" value="si">Sí
  <input type="radio" name="director" value="no">No<br>
            <label>Email</label><input type="text" name="email" id="email" value="<?php if (
isset($_POST['email'])) echo $_POST['email']; ?>"><br>
            <label>Contraseña</label><input type="password" name="pass"><br>
            <label>Telefono</label><input type="text" name="telefono" value="<?php if (
isset($_POST['telefono'])) echo $_POST['telefono']; ?>"><br>
            <label>Url personal</label><input type="text" name="url" value="<?php if (
isset($_POST['url'])) echo $_POST['url']; ?>"><br>
            <label>Departamento</label><input type="text" name="dep" value="<?php if (
isset($_POST['dep'])) echo $_POST['dep']; ?>"><br>
            <label>Centro</label><input type="text" name="centro" value="<?php if (
isset($_POST['centro'])) echo $_POST['centro']; ?>"><br>
            <label>Universidad</label><input type="text" name="uni" value="<?php if (
isset($_POST['uni'])) echo $_POST['uni']; ?>"><br>
            <label>Direccion</label><input type="text" name="dir" value="<?php if (
isset($_POST['dir'])) echo $_POST['dir']; ?>"><br>
            <label>Fotografia</label><input type="file" name="image"><br>
            <input type="submit" name="reg" value="Nuevo miembro">
    </form>
        
    </article>';
    }
    else include 'inc/error.html'
    include 'inc/footer.html';
</body>
</html>
   