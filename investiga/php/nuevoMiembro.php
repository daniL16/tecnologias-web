<?php
session_start();
require_once ('db.php');
   
$nuevo = false;

$direct = 0;
if(isset($_POST['director'])){
    if($_POST['director']==  "si"){
        $direct = 1;
    }
}

$nuevo["email"] = $_POST["email"] ;
$nuevo["nombre"] = $_POST["nombre"] ;
$nuevo["apellidos"] = $_POST["apellidos"];
//encripto la contraseña para guardarla en la BD
$nuevo["pass"] = md5($_POST["pass"]); 
$nuevo["director"] = $direct;
$nuevo["telefono"] = $_POST["telefono"];
$nuevo["url"] = mysqli_real_escape_string($_POST["url"]);
$nuevo["depart"] = mysqli_real_escape_string($_POST["dep"]);
$nuevo["centro"] = mysqli_real_escape_string( $_POST["centro"]);
$nuevo["uni"] = mysqli_real_escape_string( $_POST["uni"]);
$nuevo["direccion"] = mysqli_real_escape_string( $_POST["dir"]);
$nuevo["categoria"] = mysqli_real_escape_string($_POST["categoria"]);

$nombrefoto=$_FILES['image'] ['name']; //esto es el nombre de la imagen
$ruta=$_FILES['image'] ['tmp_name']; //se le asigna una nombre temporal que sera la ruta
// si no se especifica foto, se le asigna una por defecto
if($nombrefoto == ''){
    $destino="/img/desconocido.jpg";
}
else{
    $destino="./img/users/".$nombrefoto; //esto es el destino en donde se guardara la foto
    echo $ruta.'  '.$destino;
    move_uploaded_file($ruta, $destino);
}
$nuevo["foto"] = $destino;


$db= DB_conexion();
$ok = DB_addMiembro($db,$nuevo);
DB_log($db,$_SESSION['usuario'],"Crear usuario ".$nuevo["email"]);
DB_desconexion($db);

if($ok)
    header('Location:../miembros.php');
   
else {
    echo "Ocurrió un error durante el proceso";
}
?> 