<?php 
    require_once 'db.php';
    
    $db = DB_conexion();
    $logs = DB_getLog($db);
    $num_rows=DB_getNumLogs($db);

    echo "<table class='tabla_result'><tr><th>Usuario</th><th>Acción</th><th>Fecha</th><th>Hora</th>";
    foreach($logs as $v){
        
        echo "<tr><td class=''>{$v['USUARIO']}</td>";
        echo "<td class=''>{$v['ACCION']}</td>";
         echo "<td class=''>{$v['FECHA']}</td>";
         echo "<td class=''>{$v['HORA']}</td>";
        echo '</tr>';
    }
    echo "</table>";
    
?>