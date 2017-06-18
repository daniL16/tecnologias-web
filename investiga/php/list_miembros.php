<?php 
    require_once 'db.php';
    
    $db = DB_conexion();
    $miembros = DB_getMiembros($db);
    
    if(isset($_SESSION['admin'])){
        if ($_SESSION['admin'])
            echo"<form action='./registrar_miembro.php'><input id='nuevo_miembro_button' type='submit' value='Nuevo Miembro'/></form>";
    }

    echo "<table class='tabla_result'>";
    foreach($miembros as $miembro){
        #no quiero mostrar el usuario ADMIN 
        if ($miembro[ 'NOMBRE'] != 'ADMIN'){
        #los miembros antiguos se identifican mediante una imagen
            if($miembro['MIEMBRO_ANTIGUO'])
                  echo "<tr><td class='foto'><img src='./img/old.png'></td>";
            else
                echo "<tr><td class='foto'><img src='./{$miembro['FOTO']}'></td>";
            echo "<td><strong>{$miembro[ 'NOMBRE']} {$miembro[ 'APELLIDOS']}</strong><BR>
                  {$miembro[ 'EMAIL']}<BR>
                  {$miembro[ 'DEPARTAMENTO']}<BR>
                  {$miembro[ 'CENTRO']}<BR>
                  {$miembro[ 'UNIVERSIDAD']}<BR>
                  {$miembro[ 'DIRECCION']}<BR>
                  {$miembro[ 'TELEFONO']} <BR>";
           echo "</td>";
            
            if(isset($_SESSION['admin'])){
                if($_SESSION['admin']){
                    echo "<td class='ciu_botones'><form action='' method='POST'>
                            <input type='hidden' name='id' value='{$miembro['EMAIL']}' />
                            <input type='submit' name='accion' value='Editar' />
                            <input type='submit' name='accion' value='Borrar' />
                        </form></td>";
                    echo '</tr>';
                }
            }
        }
    }
    echo "</table>";
    
?>