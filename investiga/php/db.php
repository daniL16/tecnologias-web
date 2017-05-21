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

function DB_addMiembro($db,$datos) {
    // Comprobar si ya existe un usuario registrado con el mismo email
    $res = mysqli_query($db, "SELECT COUNT(*) FROM MIEMBROS WHERE email='{$datos['email']}'");
    $num = mysqli_fetch_row($res)[0];
    mysqli_free_result($res);
    if ($num>0)
        $info[] = 'Ya existe una usario con ese email';
    else {
        $res = mysqli_query($db, "INSERT INTO MIEMBROS (email,nombre,apellidos,password,telefono,url,departamento,centro,universidad,direccion,es_director,categoria,foto)
                                  VALUES ('{$datos['email']}','{$datos['nombre']}','{$datos['apellidos']}','{$datos['pass']}','{$datos['telefono']}','{$datos['url']}','{$datos['depart']}','{$datos['centro']}','{$datos['uni']}','{$datos['direccion']}','{$datos['director']}','{$datos['categoria']}','{$datos['foto']}')");

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
 
function DB_getMiembros($db) {
    $res = mysqli_query($db, "SELECT * FROM MIEMBROS ORDER BY NOMBRE ASC");
    if ($res) {
        // Si no hay error
        if (mysqli_num_rows($res)>0)
            // Si hay alguna tupla de respuesta
           
            $tabla = mysqli_fetch_all($res,MYSQLI_ASSOC);
        else
            // No hay resultados para la consulta
            $tabla = [];
            mysqli_free_result($res); // Liberar memoria de la consulta
    } 
    else
    // Error en la consulta
        $tabla = false;
    return $tabla;
}

function DB_borrarMiembro($db,$id) {
    mysqli_query($db, "DELETE FROM MIEMBROS WHERE EMAIL='$id'");
    if (mysqli_affected_rows($db)==1)
        return true;
    else
        return false;
}

function DB_log($db,$user,$action){
    $hora= date ("h:i:s");
    $fecha= date ("j/n/Y");
    mysqli_query($db,"INSERT INTO LOG (usuario,fecha,hora,accion) VALUES ('{$user}','{$fecha}','{$hora}','{$action}')");
}

function DB_getLog($db){
    $res = mysqli_query($db,"SELECT * FROM LOG");
      if ($res) {
        // Si no hay error
        if (mysqli_num_rows($res)>0)
            // Si hay alguna tupla de respuesta
           
            $tabla = mysqli_fetch_all($res,MYSQLI_ASSOC);
        else
            // No hay resultados para la consulta
            $tabla = [];
            mysqli_free_result($res); // Liberar memoria de la consulta
    } 
    else
    // Error en la consulta
        $tabla = false;
    return $tabla;
}

function DB_getPublicaciones($db,$filtros){
    //TITULO = {$filtros['titulo']} AND AUTOR={$filtros['autor']}  
    $res = mysqli_query($db, "SELECT * FROM PUBLICACIONES ORDER BY FECHA DESC");
    if ($res) {
        // Si no hay error
        if (mysqli_num_rows($res)>0)
            // Si hay alguna tupla de respuesta
           
            $tabla = mysqli_fetch_all($res,MYSQLI_ASSOC);
        else
            // No hay resultados para la consulta
            $tabla = [];
            mysqli_free_result($res); // Liberar memoria de la consulta
    } 
    else
    // Error en la consulta
        $tabla = false;
    return $tabla;
}

function DB_addPublicacion($db,$datos) {
    // Comprobar si ya existe una publicacion con el mismo DOI
    $res = mysqli_query($db, "SELECT COUNT(*) FROM PUBLICACIONES WHERE DOI='{$datos['DOI']}'");
    $num = mysqli_fetch_row($res)[0];
    mysqli_free_result($res);
    if ($num>0)
        $info[] = 'Ya existe una publicacion registrada';
    else {
        $res = mysqli_query($db, "INSERT INTO PUBLICACIONES (DOI,TITULO,AUTORES,FECHA,ABSTRACT,PROYECTO,URL,KEYWORDS)
                                  VALUES ('{$datos['DOI']}','{$datos['titulo']}','{$datos['autores']}','{$datos['fecha']}','{$datos['abstract']}','{$datos['proyecto']}','{$datos['url']}','{$datos['keywords']}')");

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

function DB_borrarPublicacion($db,$id) {
    mysqli_query($db, "DELETE FROM PUBLICACIONES WHERE DOI='$id'");
    if (mysqli_affected_rows($db)==1)
        return true;
    else
        return false;
}

function DB_addProyecto($db,$datos) {
    // Comprobar si ya existe un usuario registrado con el mismo email
    $res = mysqli_query($db, "SELECT COUNT(*) FROM PROYECTOS WHERE CODIGO='{$datos['codigo']}'");
    $num = mysqli_fetch_row($res)[0];
    mysqli_free_result($res);
    if ($num>0)
        $info[] = 'Ya existe un proyecto con ese código';
    else {
        $res = mysqli_query($db, "INSERT INTO PROYECTOS (codigo,titulo,fecha_comienzo,fecha_fin,descripcion,entidades,cuantia,investigador_ppal,colaboradores,url)
                                  VALUES ('{$datos['codigo']}','{$datos['titulo']}','{$datos['fecha_comienzo']}','{$datos['fecha_fin']}','{$datos['descripcion']}','{$datos['entidades']}','{$datos['cuantia']}','{$datos['investigador_ppal']}','{$datos['colaboradores']}','{$datos['url']}')");

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

function DB_getProyectos($db) {
    $res = mysqli_query($db, "SELECT * FROM PROYECTOS ORDER BY FECHA_FIN DESC");
    if ($res) {
        // Si no hay error
        if (mysqli_num_rows($res)>0)
            // Si hay alguna tupla de respuesta
           
            $tabla = mysqli_fetch_all($res,MYSQLI_ASSOC);
        else
            // No hay resultados para la consulta
            $tabla = [];
            mysqli_free_result($res); // Liberar memoria de la consulta
    } 
    else
    // Error en la consulta
        $tabla = false;
    return $tabla;
}

function DB_borrarProyecto($db,$id) {
    mysqli_query($db, "DELETE FROM PROYECTOS WHERE CODIGO='$id'");
    if (mysqli_affected_rows($db)==1)
        return true;
    else
        return false;
}
?>

