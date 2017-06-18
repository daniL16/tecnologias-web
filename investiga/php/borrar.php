<?php

require_once('db.php');

function borrarPublicacion($id){
    $db = DB_conexion();
    DB_borrarPublicacion($db,$id);
    DB_log($db,$_SESSION['usuario'],"Borrar la publicacion ".$id);
    DB_desconexion($db);
    header('Location:./publicaciones.php');
}
 
function borrarProyecto($id){
    $db = DB_conexion();
    DB_quitarPublicacionesAsociados($db,$id);
    DB_borrarProyecto($db,$id);
    DB_log($db,$_SESSION['usuario'],"Borrar proyecto ".$id);
    DB_desconexion($db);
    header('Location:./proyectos.php');
}

function borrarMiembro($id){
    $db = DB_conexion();
    DB_quitarProyectosAsociados($db,$id);
    DB_borrarMiembro($db,$id);
    DB_log($db,$_SESSION['usuario'],"Borrar al usuario ".$id);
    DB_desconexion($db);
    header('Location:./miembros.php');
}
?>