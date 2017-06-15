<?php include './inc/head.php' ?>
<body>
<?php include './inc/header.php' ?>
<?php include './inc/nav.php' ?>
<?php include './php/editar.php'?>
<?php include './php/db.php' ?>
<?php include './php/borrar.php'?>
<article id="contenido">
    <h4>Listado de proyectos del grupo.</h4>
<?php include './php/list_proyectos.php'?>

<?php 
    if (isset($_POST['accion']) && isset($_POST['id'])) {
        switch ($_POST['accion']) {
            case 'Borrar':
                $id = $_POST['id'];
                borrarProyecto($id);
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