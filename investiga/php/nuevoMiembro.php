<?php

require_once ('db.php');
   
$nuevo = false;

$direct = 0;
if($_POST['director'] == "si"){
    $direct = 1;
}

$nuevo["email"] = $_POST["email"];
$nuevo["nombre"] = $_POST["nombre"];
$nuevo["apellidos"] = $_POST["apellidos"];
//encripto la contraseña para guardarla en la BD
$nuevo["pass"] = md5($_POST["pass"]); 
$nuevo["director"] = $direct;
$nuevo["telefono"] = $_POST["telefono"];
$nuevo["url"] = $_POST["url"];
$nuevo["depart"] = $_POST["dep"];
$nuevo["centro"] = $_POST["centro"];
$nuevo["uni"] = $_POST["uni"];
$nuevo["direccion"] = $_POST["dir"];
$nuevo["categoria"] = $_POST["categoria"];
$nuevo["foto"] = $_FILES["imágenes"]["tmp_name"][$clave];

$db= DB_conexion();
$ok = DB_addMiembro($db,$nuevo);
DB_desconexion($db);

if($ok){
    header('Location:~daniellg1617/investiga/index.php');
}
else {
    echo "Ocurrió un error durante el proceso";
}
?> 