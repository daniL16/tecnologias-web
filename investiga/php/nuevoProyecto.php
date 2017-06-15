<?php
session_start();
require_once ('db.php');
   
$nuevo = false;

$nuevo["titulo"] = $_POST["tit"];
$nuevo["codigo"] = $_POST["codigo"];
$nuevo["fecha_com"] = $_POST["fecha_com"];
$nuevo["fecha_fin"] = $_POST["fecha_fin"];
$nuevo["descripcion"] = $_POST["desc"];
$nuevo["entidades"] = $_POST["entidades"];
$nuevo["cuantia"] = $_POST["cuantia"];
$nuevo["investigador_ppal"] = $_POST["inv_ppal"];
$nuevo["colaboradores"] = $_POST["colaboradores"];
$nuevo["url"] = $_POST["url"];
$db= DB_conexion();
$ok = false;
$ok = DB_addProyecto($db,$nuevo);
DB_log($db,$_SESSION['usuario'],"Registrar proyecto ".$nuevo["codigo"]);
DB_desconexion($db);

if($ok){
    header('Location:../proyectos.php');
}
else {
    echo "Ocurrió un error durante el proceso";
}
?> 