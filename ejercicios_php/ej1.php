<html lang="es">
<head>
</head>
<body>
    <?php
        $v = ["Navegador" => ["Crhome","Internet Explorer","Firefox","Safari"],"Autor"=>["Google","Microsoft","Mozilla","Opera","Apple"],
              "Licencia" =>["BSD","privativo","GNU","privativo"],"Motor"=>["Blink","Trident","Gecko","Webkit"]];
    ?>
    
    <table>
        <thead>
            <tr>
               
                    <?php   foreach($v[0] as $key=>$value){
            $html .= '<th>' . htmlspecialchars($key) . '</th>';
        } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($v as $row):
                echo "<tr><td>".implode('</td><td>', $row)."</td></tr>";
                endforeach;
            ?>
  </tbody>
</table>
</body>
</html>

