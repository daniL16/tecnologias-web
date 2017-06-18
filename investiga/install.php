
<form action="" method="post">
<label>Host</label><input type="text" name="host"><br>
<label>Database</label><input type="text" name="database"><br>
<label>Password</label><input type="password" name="pass"><br>
<label>User</label><input type="text" name ="user"><br>
<input type="submit" value="Crear Credenciales BD">
</form>

<?php
    // A partir de los datos introducidos creamos el archivo de credenciales
    if(isset($_POST['host'])){
        $f = fopen("/~daniellg1617/investiga/php/credenciales.php","w+");
        fwrite($f,"<?php 
        define('DB_HOST','{$_POST['host']}');
        define('DB_DATABASE','{$_POST['database']}'); 
        define('DB_USER','{$_POST['user']}'); 
        define('DB_PASSWD','{$_POST['pass']}'); 
        ?>");
        fclose($f);
        
        // Creamos las carpetas para backup y las imagenes de los usuarios
        
        mkdir('./img/users');
        mkdir('./backup');
        
        // Creamos las tablas de la BD
        include './php/db.php';

        $db = DB_conexion();

        mysqli_query($db,'SET FOREIGN_KEY_CHECKS=0');
        $error = '';

        //Obtenemos las sentencias sql para crear las tablas
        $sql = file_get_contents('./createbd.txt');
        $queries = explode(';',$sql);

        // Ejecutamos cada sentencia
        foreach ($queries as $q) {
        if (!mysqli_query($db,$q)) 
            $error .= mysqli_error($db);
        }

        mysqli_query($db,'SET FOREIGN_KEY_CHECKS=1');
        DB_desconexion($db);
        header('Location:./index.php');

    }
?>