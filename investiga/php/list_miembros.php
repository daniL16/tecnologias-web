<?php 
    require_once 'db.php';
    
    $db = DB_conexion();
    $miembros = DB_getMiembros($db);
    
    echo "<table>";
    foreach($miembros as $miembro){
        #no quiero mostrar el usuario ADMIN 
        if ($miembro[ 'NOMBRE'] != 'ADMIN'){
        #aqui se obtiene el nombre de la foto
            echo "<tr><td class='foto'>{$miembro["FOTO"]}</td>";
            echo "<td>{$miembro[ 'NOMBRE']} {$miembro[ 'APELLIDOS']}<BR>
                  {$miembro[ 'DEPARTAMENTO']}<BR>
                  {$miembro[ 'CENTRO']}<BR>
                  {$miembro[ 'UNIVERSIDAD']}<BR>
                  {$miembro[ 'DIRECCION']}<BR>
                  {$miembro[ 'TELEFONO']} <BR>
                </td>";
            echo "<td class='ciu_botones'><form action='$accion' method='POST'>
              <input type='hidden' name='id' value='{$miembro['EMAIL']}' />
              <input type='submit' name='accion' value='Editar' />
              <input type='submit' name='accion' value='Borrar' />
              </form></td>";
            echo '</tr>';
        }
    }
    echo "</table>";
    
?>