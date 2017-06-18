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


//Borrar archivos de backup e imagenes
$d = dir('./backup');
$imgs = dir ('./img/users');

// Recorre el directorio y borra los archivos que contiene
while (false !== ($f = $d->read())) {
   if($f !== '.' and $f !=='..'){
       unlink('./backup/'.$f);
   }
}

while (false !== ($i = $imgs->read())) {
   if($f !== '.' and $f !=='..'){
       unlink('./imgs/'.$i);
   }
}

//Borra los directorios
rmdir('./backup');
rmdir('./img/users');

//borra el archivo de credenciales
unlink('./php/credenciales_test.php');

DB_desconexion($db);

header('Location:./');

?>