<?php
session_start();
require_once ('db.php');
   
$nuevo = false;

$nuevo["titulo"] = mysql_real_escape_string($_POST["titulo"]);
$nuevo["DOI"] = mysql_real_escape_string($_POST["DOI"]);
$nuevo["fecha"] = $_POST["fecha"];
$nuevo["abstract"] = mysql_real_escape_string($_POST["abstract"]);
$nuevo["autores"] = mysql_real_escape_string($_POST["autores"]);
$nuevo["keywords"] = mysql_real_escape_string($_POST["keywords"]);
$nuevo["proyecto"] = mysql_real_escape_string($_POST["proyecto"]);
$nuevo["url"] = $_POST["url"];
$db= DB_conexion();
$ok = false;
$ok = DB_addPublicacion($db,$nuevo);
DB_log($db,$_SESSION['usuario'],"Registrar publicación ".$nuevo["titulo"]);
DB_desconexion($db);

if($ok){
    header('Location:../publicaciones.php');
}
else {
    echo "Ocurrió un error durante el proceso";
}
?> 