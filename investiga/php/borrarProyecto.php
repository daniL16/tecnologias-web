<?php

include ('db.php');

session_start();

$db = DB_conexion();
DB_borrarProyecto($db,$_POST['id']))
DB_log($db,$_SESSION['usuario'],"Borrar proyecto ".$_POST['id']);
DB_desconexion($db);
//header('Location:../miembros.php')
?>
