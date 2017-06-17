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
        $res = mysqli_fetch_row($res);
        $login["admin"] = $res[0]; 
        $login["bloqueo"] = $res[1];
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

function DB_getMiembro($db,$id){
    $res = mysqli_query($db, "SELECT * FROM MIEMBROS WHERE EMAIL='$id'");
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

function DB_updateMiembro($db,$datos){
    $res = mysqli_query($db, "UPDATE MIEMBROS SET NOMBRE='{$datos['nombre']}',
                                          APELLIDOS='{$datos['apellidos']}',
                                          TELEFONO='{$datos['telefono']}',
                                          URL='{$datos['url']}',
                                          DEPARTAMENTO = '{$datos['depart']}',
                                          CENTRO = '{$datos['centro']}',
                                          UNIVERSIDAD = '{$datos['uni']}',
                                          DIRECCION = '{$datos['direccion']}',
                                          ES_DIRECTOR ='{$datos['director']}',
                                          CATEGORIA= '{$datos['categoria']}',
                                          ES_ADMIN = '{$datos['admin']}',
                                          BLOQUEO = '{$datos['block']}',
                                          MIEMBRO_ANTIGUO ='{$datos['old']}'
                                WHERE EMAIL='{$datos['email']}'");
    if (!$res) {
        $info[] = 'Error al actualizar';
        $info[] = mysqli_error($db);
    }
    if (isset($info))
        return $info;
    else
        return true; // OK
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
    $tit = $filtros['titulo'] ;
    $aut = $filtros['autor']  ;
    
    if ($tit and $aut)
        $res = mysqli_query($db, "SELECT * FROM PUBLICACIONES WHERE TITULO='{$tit}' AND AUTORES='{$aut}' ORDER BY FECHA DESC");
    elseif($tit)
        $res = mysqli_query($db, "SELECT * FROM PUBLICACIONES WHERE TITULO='{$tit}' ORDER BY FECHA DESC");
    elseif($aut)
          $res = mysqli_query($db, "SELECT * FROM PUBLICACIONES WHERE AUTORES='{$aut}' ORDER BY FECHA DESC");
    else
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

function DB_getPublicacion($db,$id){
    $res = mysqli_query($db, "SELECT * FROM PUBLICACIONES WHERE DOI='$id'");
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

function DB_updatePublicacion($db,$datos){
       $res = mysqli_query($db, "UPDATE PUBLICACIONES SET TITULO='{$datos['titulo']}',
                                          FECHA='{$datos['fecha']}',
                                          ABSTRACT='{$datos['abstract']}',
                                          URL='{$datos['url']}',
                                          KEYWORDS = '{$datos['keywords']}',
                                          PROYECTO = '{$datos['proyecto']}',
                                          AUTORES = '{$datos['autores']}'
                                WHERE DOI='{$datos['DOI']}'");
    if (!$res) {
        $info[] = 'Error al actualizar';
        $info[] = mysqli_error($db);
    }
    if (isset($info))
        return $info;
    else
        return true; // OK
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
        $res = mysqli_query($db, "INSERT INTO PROYECTOS (CODIGO,TITULO,FECHA_COMIENZO,FECHA_FIN,DESCRIPCION,ENTIDADES,CUANTIA,INVESTIGADOR_PPAL,COLABORADORES,URL)                                VALUES ('{$datos['codigo']}','{$datos['titulo']}','{$datos['fecha_com']}','{$datos['fecha_fin']}','{$datos['descripcion']}','{$datos['entidades']}','{$datos['cuantia']}','{$datos['investigador_ppal']}','{$datos['colaboradores']}','{$datos['url']}')");
        
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

function DB_getProyecto($db,$id){
      $res = mysqli_query($db, "SELECT * FROM PROYECTOS WHERE CODIGO='$id'");
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

function DB_updateProyecto($db,$datos){
           $res = mysqli_query($db, "UPDATE PROYECTOS SET TITULO='{$datos['titulo']}',
                                          FECHA_COMIENZO='{$datos['fecha_com']}',
                                          FECHA_FIN='{$datos['fecha_fin']}',
                                          DESCRIPCION='{$datos['descripcion']}',
                                          ENTIDADES='{$datos['entidades']}',
                                          CUANTIA = '{$datos['cuantia']}',
                                          INVESTIGADOR_PPAL = '{$datos['investigador_ppal']}',
                                          COLABORADORES = '{$datos['colaboradores']}',
                                          URL = '{$datos['url']}'
                                WHERE CODIGO='{$datos['codigo']}'");
    if (!$res) {
        $info[] = 'Error al actualizar';
        $info[] = mysqli_error($db);
    }
    if (isset($info))
        return $info;
    else
        return true; // OK
}

function DB_borrarProyecto($db,$id) {
    mysqli_query($db, "DELETE FROM PROYECTOS WHERE CODIGO='$id'");
    if (mysqli_affected_rows($db)==1)
        return true;
    else
        return false;
}

// Obtiene las publicaciones asociadas a un proyecto.
function DB_listPublicaciones($db,$id){
    $res = mysqli_query($db, "SELECT TITULO FROM PUBLICACIONES WHERE PROYECTO='$id'");
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

/* Antes de borrar un proyecto busca las publiciones que referencian a dicho
   proyecto y elimina la referencia*/
function DB_quitarPublicacionesAsociados($db,$id){
     $res = mysqli_query($db, "UPDATE PUBLICACIONES SET PROYECTO='NULL'
                                WHERE PROYECTO='{$id}'");
}

/* Antes de borrar un miembro busca los proyectos que referencian a dicho
   miembro y elimina la referencia*/
function DB_quitarProyectosAsociados($db,$id){
     $res = mysqli_query($db, "UPDATE PROYECTOS SET INVESTIGADOR_PPAL='NULL'
                                WHERE INVESTIGADOR_PPAL='{$id}'");
}

//Obtener numero de filas de LOG
function DB_getNumLogs($db){
    $res = mysqli_query($db, "SELECT COUNT(*) FROM LOG");
    $num = mysqli_fetch_row($res)[0];
    mysqli_free_result($res);
    return $num;
}

?>