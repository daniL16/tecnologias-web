<?php

include ('db.php');

session_start();

$db = DB_conexion();
DB_borrarPublicacion($db,$_POST['id']);
DB_log($db,$_SESSION['usuario'],"Borrar la publicacion ".$_POST['id']);
DB_desconexion($db);
//header('Location:../publicaciones.php')
?>

