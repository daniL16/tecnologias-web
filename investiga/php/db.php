<?php

require_once('credenciales_local.php');

// Conexión a la BBDD
function DB_conexion() {
    $db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWD,DB_DATABASE);
        if (!$db) {
            echo "<p>Error de conexión</p>";
            echo "<p>Código: ".mysqli_connect_errno()."</p>";
            echo "<p>Mensaje: ".mysqli_connect_error()."</p>";
            return false;
        }

    // Establecer la codificación de los datos almacenados ("collation")
    mysqli_set_charset($db,"utf8");
    return $db;
}

// Desconexión de la BBDD
function DB_desconexion($db) {
    mysqli_close($db);
}

function DB_addMiembro($db,$datos) {
    // Comprobar si ya existe un usuario registrado con el mismo email
    $res = mysqli_query($db, "SELECT COUNT(*) FROM MIEMBROS WHERE email='{$datos['email']}'");
    $num = mysqli_fetch_row($res)[0];
    mysqli_free_result($res);
    if ($num>0)
        $info[] = 'Ya existe una usario con ese email';
    else {
        $res = mysqli_query($db, "INSERT INTO MIEMBROS (email,nombre,apellidos,password,telefono,url,departamento,centro,universidad,direccion,es_director,categoria)
                                  VALUES ('{$datos['email']}','{$datos['nombre']}','{$datos['apellidos']}','{$datos['pass']}','{$datos['telefono']}','{$datos['url']}','{$datos['depart']}','{$datos['centro']}','{$datos['uni']}','{$datos['direccion']}','{$datos['director']}','{$datos['categoria']}')");

        if (!$res) {
            $info[] = 'Error en la consulta '.__FUNCTION__;
            $info[] = mysqli_error($db);
        }
    }
    if (isset($info))
        return $info;
    else
        return true; // OK
}

function DB_login($db,$user,$pass) {
    $password = md5($pass);
    $prep = mysqli_prepare($db, "SELECT ES_ADMIN,BLOQUEO FROM MIEMBROS WHERE EMAIL=? AND PASSWORD=?");
    mysqli_stmt_bind_param($prep,'ss',$user,$password);
    mysqli_stmt_execute($prep);
    
    // Obtengo el resultado de la consulta y el numero de filas(será 0 o 1)
    $res = mysqli_stmt_get_result($prep);
    $num = mysqli_num_rows($res);
    // Compruebo que existe el usuario y que no esta bloqueado
    if($num>0){
        $login["admin"] = mysqli_fetch_row($res)[0];
        return $login;
    }
    else
        return false;
}
?>