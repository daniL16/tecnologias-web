<html>
<head lang="es">
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "./css/estilos.css" />
    <link rel = "stylesheet" type = "text/css" href = "./css/ficha.css" />
    <title>Grupo de Investigación</title>
</head>
<body>
<?php include 'inc/header.php' ?>
<?php include 'inc/nav.php' ?>    
<article id="contenido">
<input type="submit" value="Nuevo Miembro" onclick = "location='/registrar_miembro.php'"/>
    
<?php 
    if (isset($_POST['accion']) && isset($_POST['id'])) {
        switch ($_POST['accion']) {
            case 'Borrar': // Presentar formulario y pedir confirmación
                $accion = '/php/borrarMiembro.php';
                $id = $_POST['id'];
                break;
            case 'Editar': // Presentar formulario y pedir confirmación
                $accion = 'Editar';
                $id = $_POST['id'];
                break;
            case 'Confirmar Borrado': // Borrado confirmado
                $accion = 'BorrarOK';
                $id = $_POST['id'];
                break;
            case 'Modificar Datos': // Modificación confirmada
                $accion = 'Modificar';
                $id = $_POST['id'];
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