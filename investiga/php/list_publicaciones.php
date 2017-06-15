<?php 
    require_once 'db.php';
    session_start();

    $db = DB_conexion();
    $filtros["autor"] = $_GET["autor"] ;
    $filtros["titulo"] = $_GET["titulo"];
    $publicaciones = DB_getPublicaciones($db,$filtros);
    if (isset($_SESSION['usuario'])){
        echo"<form action='./registrar_publicacion.php'><input id='nuevo_miembro_button' type='submit' value='Añadir nueva publicacion' /></form>";
    }
    echo "<table class='tabla_result'>";
    foreach($publicaciones as $publicacion){
            echo "<tr>
                  <td>{$publicacion[ 'DOI']} <strong>{$publicacion[ 'TITULO']}</strong><BR>
                  {$publicacion[ 'FECHA']}<BR>
                  {$publicacion['AUTORES']}<BR>
                  {$publicacion[ 'CENTRO']}<BR>
                  Keywords:{$publicacion['KEYWORDS']}<BR>
                  <a href='{$publicacion[ 'URL']}'>URL</a><BR>
                  Proyecto asociado:{$publicacion[ 'PROYECTO']} <BR>
                  {$publicacion[ 'ABSTRACT']}<BR>
                 
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

