<?php

require_once ('db.php');
session_start();
// Creamos el archivo donde se vuelca el backup
$fecha=date("d-m-Y");
$hora=date("h:m:s A");
$file = fopen("../backup/backup_.$fecha.$hora.txt", "w+");

$db = DB_conexion();

// Obtener listado de tablas
$tablas = array();
$result = mysqli_query($db,'SHOW TABLES');
while ($row = mysqli_fetch_row($result))
    $tablas[] = $row[0];


// Salvar cada tabla
$salida = '';
foreach ($tablas as $tab) {
    $salida = ' ';

    $result = mysqli_query($db,'SELECT * FROM '.$tab);
    $num = mysqli_num_fields($result);
    $salida .= 'DROP TABLE '.$tab.';';
    $row2 = mysqli_fetch_row(mysqli_query($db,'SHOW CREATE TABLE '.$tab));
    $salida .= "\n\n".$row2[1].";\n\n"; // row2[0]=nombre de tabla
    while ($row = mysqli_fetch_row($result)) {
        $salida .= 'INSERT INTO '.$tab.' VALUES(';
        for ($j=0; $j<$num; $j++) {
            $row[$j] = addslashes($row[$j]);
            $row[$j] = preg_replace("/\n/","\\n",$row[$j]);
            if (isset($row[$j]))
                $salida .= '"'.$row[$j].'"';
            else
                $salida .= '""';
            if ($j < ($num-1)) $salida .= ',';
        }
        $salida .= ");\n";
        }
    $salida .= "\n\n\n";
    fwrite($file, $salida);
}
   fclose($file);
   DB_log($db,$_SESSION['usuario'],"Realiza un backup de la BD ");
   header('Location:../backup.php');
?>