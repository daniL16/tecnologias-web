<html lang="es">
<head>
</head>
<body>
    <?php
        $v = ["Chrome"=>["Autor"=>"Google","Licencia" =>"BSD","Motor"=>"Blink"],"Internet Explorer"=>["Autor"=>"Microsoft","Licencia" =>"privativo","Motor"=>"Trident"],"Firefox"=>["Autor"=>"Mozilla","Licencia" =>"GNU","Motor"=>"Gecko"],"Safari"=>["Autor"=>"Apple","Licencia" =>"privativo","Motor"=>"Webkit"]];
    
    ?>
    
    
    
    <table>
        <thead>
        <tr>
            <th>Navegador</th>
	    <th>Autor</th>
	    <th>Licencia</th>
	    <th>Motor</th>            
	</tr>
        </thead>
        
	<tbody>
        <?php  foreach (array_keys($v) as $key):
                    echo "<tr><td>".$key."</td>";
                    foreach($v[$key] as $celda):
                        echo "<td>".$celda."</td>";
                    endforeach;
                    echo "</tr>";
                    endforeach;
            
        ?>
        </tbody>
    </table>
</body>
</html>

