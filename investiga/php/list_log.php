<?php 
    require_once 'db.php';
    
    $db = DB_conexion();

    if(isset($_GET['pag'])){
        $actual = $_GET['pag'];
        $inicio = ($actual-1)*5;
        $nfilas = 5;
    }
    else{
        $inicio = 0;
        $nfilas = 5;
        $actual = 1;
    }
    

    $logs = DB_getLog($db,$inicio,$nfilas);

    $num_rows=DB_getNumLogs($db);
    $anterior=$actual-1;
    $siguiente=$actual+1;
    $ultima=floor($num_rows/5);

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

