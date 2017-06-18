<?php 
    require_once 'db.php';
    

    $db = DB_conexion();
    
    $proyectos = DB_getProyectos($db);
    
    if (isset($_SESSION['usuario'])){
        echo"<form action='./registrar_proyecto.php'><input id='nuevo_miembro_button' type='submit' value='Añadir nuevo proyecto' /></form>";
    }
    echo "<table class='tabla_result'>";
    foreach($proyectos as $proyecto){
            $cod = $proyecto['CODIGO'];
            $publicaciones = DB_listPublicaciones($db,$cod);
            
            echo"<th></th><th>Publicaciones asociadas</th><th></th>";
            
            echo "<tr>
            <td>{$cod} {$proyecto[ 'TITULO']}<BR>
                  Fecha inicio:{$proyecto[ 'FECHA_COMIENZO']}<BR>
                  Fecha fin:{$proyecto[ 'FECHA_FIN']}<BR>
                  <a href={$proyecto[ 'URL']}>URL</a><BR>
                  Investigador: {$proyecto[ 'INVESTIGADOR_PPAL']} <BR>
                  Colaboradores: {$proyecto[ 'COLABORADORES']} <BR>
                  Entidades:{$proyecto[ 'ENTIDADES']}<BR>
                  {$proyecto[ 'DESCRIPCION']}<BR>
            </td>";
            
            echo "<td>";
                
                
            foreach($publicaciones as $publi){
                
                echo "{$publi['TITULO']}<br>";
            }
            echo "</td>";
            
            if (isset($_SESSION['usuario'])){
            echo "<td class='ciu_botones'><form action='' method='POST'>
              <input type='hidden' name='id' value='{$proyecto['CODIGO']}' />
              <input type='submit' name='accion' value='Editar' />
              <input type='submit' name='accion' value='Borrar' />
              </form></td>";
            }
                echo '</tr>';
            
        }
    
    echo "</table>";
?>