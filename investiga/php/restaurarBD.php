<?php

include 'db.php';
session_start();

$db = DB_conexion();

mysqli_query($db,'SET FOREIGN_KEY_CHECKS=0');
$error = '';

//Obtengo el último backup realizado
$d = dir("../backup");
$f = $d->read();

//Obtenemos las sentencias sql
$sql = file_get_contents('../backup/'.$f);
$queries = explode(';',$sql);

// Ejecutamos cada sentencia
foreach ($queries as $q) {
    if (!mysqli_query($db,$q)) 
        $error .= mysqli_error($db);
}

mysqli_query($db,'SET FOREIGN_KEY_CHECKS=1');
DB_log($db,$_SESSION['usuario'],"Restaura la BD ");
header('Location:../backup.php');
?>