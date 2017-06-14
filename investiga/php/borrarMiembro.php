<?php

include ('db.php');

session_start();

$db = DB_conexion();
if(DB_borrarMiembro($db,$_POST['id']))
    $info[]='El usuario '.$_POST['id'].' ha sido eliminado correctamente';

DB_log($db,$_SESSION['usuario'],"Borrar al usuario ".$_POST['id']);
DB_desconexion($db);
//header('Location:../miembros.php')
?>

