<?php
include './php/db.php';

$db = DB_conexion();

// Obtener listado de tablas de la BD
$tablas = array();
$result = mysqli_query($db,'SHOW TABLES');
while ($row = mysqli_fetch_row($result))
    $tablas[] = $row[0];

//Borramos las tablas
foreach ($tablas as $tab) {
        $q = ' ';
        $q .= 'DROP TABLE '.$tab.';';
        mysqli_query($db,$q);
}
// Borrar archivos de backup e imagenes
DB_desconexion($db);

header('Location:./');

?>