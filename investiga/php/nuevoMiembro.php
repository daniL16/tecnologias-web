<?php

require_once 'usuarios.class.inc';

$nuevo = new Usuarios(" ");

$direct = 0;
if($_POST['director'] == "si"){
    $direct = 1;
}

$ok=$nuevo->nuevoMiembro($_POST["email"],$_POST["nombre"],$_POST["apellidos"],$_POST["pass"],$direct,$_POST["telefono"],$_POST["url"],$_POST["dep"],$_POST["centro"],$_POST["uni"],$_POST["dir"]);
if($ok){
    header('Location:/index.php');
}
?> 