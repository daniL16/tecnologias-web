<?php 
    require_once 'db.php';
    
    $db = DB_conexion();
    $miembros = DB_getMiembros($db);
    session_start();
    if ($_SESSION['admin'])
        echo"<form action='./registrar_miembro.php'><input id='nuevo_miembro_button' type='submit' value='Nuevo Miembro'/></form>";
    echo "<table class='tabla_result'>";
    foreach($miembros as $miembro){
        #no quiero mostrar el usuario ADMIN 
        if ($miembro[ 'NOMBRE'] != 'ADMIN'){
        #aqui se obtiene el nombre de la foto
            echo "<tr><td class='foto'><img src='../{$miembro['FOTO']}'></td>";
            echo "<td>{$miembro[ 'NOMBRE']} {$miembro[ 'APELLIDOS']}<BR>
                  {$miembro[ 'DEPARTAMENTO']}<BR>
                  {$miembro[ 'CENTRO']}<BR>
                  {$miembro[ 'UNIVERSIDAD']}<BR>
                  {$miembro[ 'DIRECCION']}<BR>
                  {$miembro[ 'TELEFONO']} <BR>
                </td>";
            if($_SESSION['admin']){
            echo "<td class='ciu_botones'><form action='$accion' method='POST'>
              <input type='hidden' name='id' value='{$miembro['EMAIL']}' />
              <input type='submit' name='accion' value='Editar' />
              <input type='submit' name='accion' value='Borrar' />
              </form></td>";
            echo '</tr>';
            }
        }
    }
    echo "</table>";
    
?>