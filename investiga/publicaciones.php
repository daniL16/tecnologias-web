<html>
<head lang="es">
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "./css/estilos.css" />
    <title>Grupo de Investigación</title>
</head>
<body>
<?php include 'inc/header.php' ?>
<?php include 'inc/nav.php' ?>    
<article id="contenido">
<h4>Listado de publicaciones del grupo.</h4>
<!-- form busqueda-->
<?php 
    if (isset($_POST['accion']) && isset($_POST['id'])) {
        switch ($_POST['accion']) {
            case 'Borrar':
                $accion = './php/borrarPublicacion.php';
                $id = $_POST['id'];
                break;
            case 'Editar': // Presentar formulario y pedir confirmación
                $accion = '';
                $id = $_POST['id'];
                break;
        
            case 'Modificar Datos': // Modificación confirmada
                $accion = '';
                $id = $_POST['id'];
                break;
            case 'Cancelar': break;
        }
    }
?>

<?php include './php/list_publicaciones.php'?>

</article>
<?php include 'inc/footer.html'?>
</body>
</html>