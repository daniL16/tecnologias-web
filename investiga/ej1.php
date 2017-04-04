<html lang="es">
<head>
</head>
<body>
    <?php
        $v = ["Chrome" => ["","Internet Explorer","Firefox","Safari"],"Autor"=>["Google","Microsoft","Mozilla","Apple"],
              "Licencia" =>["BSD","privativo","GNU","privativo"],"Motor"=>["Blink","Trident","Gecko","Webkit"]];
    
    ?>
    
    
    
    <table>
        <thead>
            <tr>
            <?php  foreach (array_keys($v) as $key):
                        echo "<th>".$key."</th>";
                    endforeach;
            ?>
            </tr>
        </thead>
        <tbody>
        <?php  foreach (array_keys($v) as $key):
                    echo "<tr>";
                    foreach($v[$key] as $celda):
                        echo "<td>".$celda."</td>";
                    endforeach;
                    echo "</tr>";
                    endforeach;
            
            echo "{$v['Chrome']['Autor']}";
            ?>
        </tbody>
    </table>
</body>
</html>

