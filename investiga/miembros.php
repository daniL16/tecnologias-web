<?php include 'inc/head.php' ?>
<body>
<?php include 'inc/header.php' ?>
<?php include 'inc/nav.php' ?>
    
<?php include './php/editar.php'?>
<?php include './php/db.php' ?>
<?php include './php/borrar.php'?>
    
<article id="contenido">
<?php include 'php/list_miembros.php' ?>   
<?php 
    if (isset($_POST['accion']) && isset($_POST['id'])) {
        switch ($_POST['accion']) {
            case 'Borrar':
                $id = $_POST['id'];
                borrarMiembro($id);
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

</article>
<?php include 'inc/footer.html'?>
</body>
</html>