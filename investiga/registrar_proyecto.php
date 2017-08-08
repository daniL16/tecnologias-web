<?php include 'inc/head.php' ?>
<body>
<?php 
    include 'inc/header.php';
    include 'inc/nav.php'; 
    require_once './php/db.php';
    
    
    
    if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autenticado'){
        $db = DB_conexion();
        $miembros = DB_getMiembros($db);

        echo '<article id="contenido">
              <form  id="registro" method=post action="./php/nuevoProyecto.php" onsubmit="return validar_fechas();" >
              <label>Título</label><input type="text" name="tit" id="tit"><br>
              <label>Código</label><input type="text" name="codigo" id="codigo"><br>
              <label>Fecha comienzo</label><input type="date" id="fechas" name="fecha_com"><br>
              <label>Fecha fin</label><input type="date"  id="fechas" name="fecha_fin" id="fecha_fin"><br>
              <label>Entidades colaboradoras</label><input type="text" name="entidades"><br>
              <label>Cuantia concedida</label><input type="text" name="cuantia"><br>
              <label>Url</label><input type="text" name="url"><br>
              <label>Investigador principal</label><select name="inv_ppal">';
        
        foreach ($miembros as $miembro){
            echo "<option value={$miembro[ 'EMAIL']}>{$miembro[ 'NOMBRE']}{$miembro[ 'APELLIDOS']}</option>";
        }
        
        echo '</select><br>
              <label>Investigadores colaboradores</label><ul>';
        
        foreach ($miembros as $miembro){
            echo "<li><input type='checkbox' name='inv_col[]' value={$miembro[ 'EMAIL']}> {$miembro[ 'NOMBRE']}{$miembro[ 'APELLIDOS']} </li><br>";
        }
        
        echo  '<li><input type="text" name="inv_col[]" placeholder="Otro"></li></ul>
              <label>Descripción</label><textarea name="desc"></textarea><br>
              <input type="submit" name="reg" value="Nuevo proyecto">
              </form>
              </article>';
    }
    else include 'inc/error.html';
    include 'inc/footer.html'?>
</body>
</html>