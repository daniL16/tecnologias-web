<?php 
    require_once 'db.php';
    
    $db = DB_conexion();

    if(isset($_GET['pag'])){
        $actual = $_GET['pag'];
        $inicio = ($actual-1)*10;
        $fin = $inicio+10;
    }
    else{
        $inicio = 0;
        $fin = 5;
        $actual = 1;
    }
    

    $logs = DB_getLog($db,$inicio,$fin);

    $num_rows=DB_getNumLogs($db);
    $anterior=$actual-1;
    $siguiente=$actual+1;
    $ultima=$num_rows/10;

    echo "<table class='tabla_result'><tr><th>Usuario</th><th>Acción</th><th>Fecha</th><th>Hora</th>";
    foreach($logs as $v){
        
        echo "<tr><td class=''>{$v['USUARIO']}</td>";
        echo "<td class=''>{$v['ACCION']}</td>";
         echo "<td class=''>{$v['FECHA']}</td>";
         echo "<td class=''>{$v['HORA']}</td>";
        echo '</tr>';
    }
    echo "</table>";
    
    echo "<p id='paginador'><a class='pags' onclick='activarPagina(1)'>Primera</a> ";
    if($actual>1) 
        echo "<a class='pags' onclick='activarPagina({$anterior})'>Anterior</a> ";
    echo "<strong class='pags'>Pagina ".$actual."</strong>";
    if($actual<$ultima)
        echo " <a class='pags' onclick='activarPagina({$siguiente})'>Siguiente</a> ";
    echo "<a  class='pags' onclick='activarPagina({$ultima})'>Ultima</a></p>";
?>

