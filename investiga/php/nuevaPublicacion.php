<?php
session_start();
require_once ('db.php');
   
$nuevo = false;

$nuevo["titulo"] = $_POST["titulo"];
$nuevo["DOI"] = $_POST["DOI"];
$nuevo["fecha"] = $_POST["fecha"];
$nuevo["abstract"] = $_POST["abstract"];
$nuevo["autores"] = $_POST["autores"];
$nuevo["keywords"] = $_POST["keywords"];
$nuevo["proyecto"] = $_POST["proyecto"];
$nuevo["url"] = $_POST["url"];
$db= DB_conexion();
$ok = false;
$ok = DB_addPublicacion($db,$nuevo);
DB_log($db,$_SESSION['usuario'],"Registrar publicación".$nuevo["email"]);
DB_desconexion($db);

if($ok){
    header('Location:../publicaciones.php');
}
else {
    echo "Ocurrió un error durante el proceso";
}
?> 