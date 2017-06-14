<html>
<head lang="es">
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "./css/estilos.css" />
    <link rel = "stylesheet" type = "text/css" href = "./css/ficha.css" />
    <title>Grupo de Investigación</title>
</head>
<body>
<?php include 'inc/header.php' ?>
<?php include 'php/db.php' ?>
<?php include 'inc/nav.php' ?>
<?php include 'php/editar.php' ?>
<article id="contenido">
 
<?php 
    if (isset($_POST['accion']) && isset($_POST['id'])) {
        switch ($_POST['accion']) {
            case 'Borrar':
                $accion = '/php/borrarMiembro.php';
                $id = $_POST['id'];
                break;
            case 'Editar': // Presentar formulario y pedir confirmación
                $id = $_POST['id'];
                $db = DB_conexion();
                $datos = DB_getMiembro($db,$id);
                FORM_editMiembro($datos);
                break;
            case 'Cancelar': break;
        }
    }
?>
<?php include 'php/list_miembros.php' ?>   
</article>
<?php include 'inc/footer.html'?>
</body>
</html>