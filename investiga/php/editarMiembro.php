<?php
session_start();
require_once ('db.php');
   
$nuevo = false;

$direct = 0;
if($_POST['director'] == "si"){
    $direct = 1;
}

$admin = 0;
if($_POST['admin'] == "si"){
    $admin = 1;
}

$old = 0;
if($_POST['old'] == "si"){
    $old = 1;
}

$block = 0;
if($_POST['block'] == "si"){
    $block = 1;
}

$nuevo["email"] = mysqli_real_escape_string($_POST["email"]);
$nuevo["nombre"] = mysqli_real_escape_string($_POST["nombre"]);
$nuevo["apellidos"] = mysqli_real_escape_string( $_POST["apellidos"]); 
$nuevo["director"] = $direct;
$nuevo["telefono"] = $_POST["telefono"];
$nuevo["url"] = mysqli_real_escape_string( $_POST["url"]);
$nuevo["depart"] = mysqli_real_escape_string( $_POST["dep"]);
$nuevo["centro"] = mysqli_real_escape_string( $_POST["centro"]);
$nuevo["uni"] = mysqli_real_escape_string( $_POST["uni"]);
$nuevo["direccion"] = mysqli_real_escape_string( $_POST["dir"]);
$nuevo["categoria"] = mysqli_real_escape_string( $_POST["categoria"]);
$nuevo["admin"] = $admin;
$nuevo["old"] = $old;
$nuevo["block"] = $block;


$db= DB_conexion();
$ok = DB_updateMiembro($db,$nuevo);
DB_log($db,$_SESSION['usuario'],"Editar usuario ".$nuevo["email"]);
DB_desconexion($db);

if($ok){
    header('Location:../miembros.php');
}
else {
    echo "Ocurrió un error durante el proceso";
}

?>