#copiar archivos
#credenciales
#base de datos
<?php

include './php/db.php';

$db = DB_conexion();

mysqli_query($db,'SET FOREIGN_KEY_CHECKS=0');
$error = '';

//Obtengo el último backup realizado

//Obtenemos las sentencias sql
$sql = file_get_contents('./backup/createbd.txt');
$queries = explode(';',$sql);

// Ejecutamos cada sentencia
foreach ($queries as $q) {
    if (!mysqli_query($db,$q)) 
        $error .= mysqli_error($db);
}

mysqli_query($db,'SET FOREIGN_KEY_CHECKS=1');
header('Location:./index.php');