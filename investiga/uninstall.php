<?php
include './php/db.php';

$db = DB_conexion();

// Obtener listado de tablas
$tablas = array();
$result = mysqli_query($db,'SHOW TABLES');
while ($row = mysqli_fetch_row($result))
    $tablas[] = $row[0];
   
foreach ($tablas as $tab) {
        $q = ' ';
        $q .= 'DROP TABLE '.$tab.';';
        mysqli_query($db,$q);
        echo $q;
    }

DB_desconexion($db);
header('Location:./');

?>