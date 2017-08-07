<?php
session_start();
require_once ('db.php');
   
$nuevo = false;

$nuevo["titulo"] = mysqli_real_escape_string( $_POST["tit"]);
$nuevo["codigo"] = mysqli_real_escape_string( $_POST["codigo"]);
$nuevo["fecha_com"] = $_POST["fecha_com"];
$nuevo["fecha_fin"] = $_POST["fecha_fin"];
$nuevo["descripcion"] = mysqli_real_escape_string( $_POST["desc"]);
$nuevo["entidades"] = mysqli_real_escape_string( $_POST["entidades"]);
$nuevo["cuantia"] = mysqli_real_escape_string( $_POST["cuantia"] );
$nuevo["investigador_ppal"] = mysqil_real_escape_string( $_POST["inv_ppal"]);
$nuevo["colaboradores"] = $_POST["colaboradores"];
$nuevo["url"] = mysqli_real_escape_string( $_POST["url"] );
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