#copiar archivos

#credenciales
<?php

    
    $f = fopen("./php/credenciales_test.php","w+");
    /*//pillar entradas
    fwrite($f,"<?php define('DB_HOST','{$host}');
    define('DB_DATABASE','{$database}'); 
    define('DB_USER', '{$user}' ); 
    define('DB_PASSWD', '{$pass}' );
    ?>";
    fclose($f);*/
?>



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
DB_desconexion($db);
header('Location:./index.php');
?>