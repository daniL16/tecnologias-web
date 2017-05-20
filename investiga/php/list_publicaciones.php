<?php 
    require_once 'db.php';
    $db = DB_conexion();
    $publicaciones = DB_getPublicaciones($db,$filtros);
    session_start();
    if (isset($_SESSION['usuario'])){
        echo"<form action='./registrar_publicacion.php'><input id='nuevo_miembro_button' type='submit' value='Añadir nueva publicacion' /></form>";
    }
    echo "<table class='tabla_result'>";
    foreach($publicaciones as $publicacion){
            echo "<tr><td>{$publicacion[ 'DOI']} {$publicacion[ 'TITULO']}<BR>
                  {$publicacion[ 'FECHA']}<BR>
                  {$publicacion[ 'CENTRO']}<BR>
                  {$publicacion[ 'ABSTRACT']}<BR>
                  {$publicacion[ 'URL']}<BR>
                  {$publicacion[ 'PROYECTO']} <BR>
                </td>";
            if (isset($_SESSION['usuario'])){
            echo "<td class='ciu_botones'><form action='$accion' method='POST'>
              <input type='hidden' name='id' value='{$publicacion['DOI']}' />
              <input type='submit' name='accion' value='Editar' />
              <input type='submit' name='accion' value='Borrar' />
              </form></td>";
            }
                echo '</tr>';
            
        }
    
    echo "</table>";
    
?>

