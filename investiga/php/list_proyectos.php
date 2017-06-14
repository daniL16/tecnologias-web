<?php 
    require_once 'db.php';
    session_start();

    $db = DB_conexion();
    
    $proyectos = DB_getProyectos($db);

    if (isset($_SESSION['usuario'])){
        echo"<form action='./registrar_proyecto.php'><input id='nuevo_miembro_button' type='submit' value='Añadir nuevo proyecto' /></form>";
    }
    echo "<table class='tabla_result'>";
    foreach($proyectos as $proyecto){
            echo "<tr><td>{$proyecto[ 'CODIGO']} {$proyecto[ 'TITULO']}<BR>
                  {$proyecto[ 'FECHA_FIN']}<BR>
                  {$proyecto[ 'CENTRO']}<BR>
                  {$proyecto[ 'DESCRIPCION']}<BR>
                  {$proyecto[ 'URL']}<BR>
                  {$proyecto[ 'INVESTIGADOR_PPAL']} <BR>
                  {$proyecto[ 'COLABORADORES']} <BR>
                </td>";
            if (isset($_SESSION['usuario'])){
            echo "<td class='ciu_botones'><form action='$accion' method='POST'>
              <input type='hidden' name='id' value='{$proyecto['CODIGO']}' />
              <input type='submit' name='accion' value='Editar' />
              <input type='submit' name='accion' value='Borrar' />
              </form></td>";
            }
                echo '</tr>';
            
        }
    
    echo "</table>";
?>