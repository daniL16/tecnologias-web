<html>
<head lang="es">
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "./css/estilos.css" />
    <link rel = "stylesheet" type = "text/css" href = "./css/formularios.css" />
    <title>Grupo de Investigación</title>
</head>
<body>
<?php include 'inc/header.php' ?>
<?php include 'inc/nav.php' ?>
<?php include 'php/bd.php' ?>
<?php include 'php/editar.php' ?>
<article id="contenido">
    <h4>Listado de proyectos del grupo.</h4>
<?php include './php/list_proyectos.php'?>

<?php 
    if (isset($_POST['accion']) && isset($_POST['id'])) {
        switch ($_POST['accion']) {
            case 'Borrar':
                $accion = './php/borrarProyecto.php';
                $id = $_POST['id'];
                break;
            case 'Editar': // Presentar formulario y pedir confirmación
                $id = $_POST['id'];
                $db = DB_conexion();
                $datos = DB_getProyecto($db,$id);
                FORM_editProyecto($datos);
                break;
        }
    }
?>
</article>
<?php include 'inc/footer.html'?>
</body>
</html>