<?php include 'inc/head.php'?>
<body>
<?php include 'inc/header.php' ?>
<?php include 'inc/nav.php' ?> 
<?php include './php/editar.php'?>
<?php include './php/db.php' ?>
<?php include './php/borrar.php'?>
<article id="contenido">
<h4>Listado de publicaciones del grupo.</h4>
    <form class="formulario_busqueda" method="get">
    <label>Autor</label><input type="text" name="autor"><label>Título</label><input type="text" name="titulo">
    <br><input type="submit" value="Filtrar">
    </form>
    
<?php include './php/list_publicaciones.php'?>
    
<?php 
    if (isset($_POST['accion']) && isset($_POST['id'])) {
        switch ($_POST['accion']) {
            case 'Borrar':
                $id = $_POST['id'];
                borrarPublicacion($id);
                break;
            case 'Editar': // Presentar formulario y pedir confirmación
                $id = $_POST['id'];
                $db = DB_conexion();
                $datos = DB_getPublicacion($db,$id);
                FORM_editPublicacion($datos);
                break;
    
        }
    }
?>



</article>
<?php include 'inc/footer.html'?>
</body>
</html>