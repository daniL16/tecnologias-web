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

$nuevo["email"] = $_POST["email"];
$nuevo["nombre"] = $_POST["nombre"];
$nuevo["apellidos"] = $_POST["apellidos"]; 
$nuevo["director"] = $direct;
$nuevo["telefono"] = $_POST["telefono"];
$nuevo["url"] = $_POST["url"];
$nuevo["depart"] = $_POST["dep"];
$nuevo["centro"] = $_POST["centro"];
$nuevo["uni"] = $_POST["uni"];
$nuevo["direccion"] = $_POST["dir"];
$nuevo["categoria"] = $_POST["categoria"];
$nuevo["admin"] = $admin;
$nuevo["old"] = $old;
$nuevo["block"] = $block;


$db= DB_conexion();
$ok = DB_updateMiembro($db,$nuevo);
DB_log($db,$_SESSION['usuario'],"Editar usuario ".$nuevo["email"]);
DB_desconexion($db);

if($ok){
    //header('Location:~daniellg1617/investiga/index.php');
    header('Location:../miembros.php');
}
else {
    echo "Ocurrió un error durante el proceso";
}

?>