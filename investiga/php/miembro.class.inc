<?php

require_once ('datosObject.class.inc');

class Miembro extends DataObject {

    protected $datos = array(
        "NOMBRE" => "",
        "APELLIDOS" => "",
        "CLAVE" => "",
        "CATEGORIA" => "",
        "DIRECCION" => "",
        "TELEFONO" => "",
        "URL" => "",
        "DEPARTAMENTO" => "",
        "EMAIL" => "",
        "CENTRO" => "",
        "UNIVERSIDAD" => "",
        "FOTO" => "",
        "ES_DIRECTOR"=>"",
        "ADMIN"=>"",
        "BLOQUEO"=>"",
        "MIEMBRO_ANTIGUO"=>""
    );

    public static function obtenerUsuarios($filaInicio, $numeroFilas, $orden) {
        $conexion = parent::conectar();
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM " . TABLA_USUARIOS . " ORDER BY " . $orden . " LIMIT :filaInicio, :numeroFilas";

        try {
            $st = $conexion->prepare($sql);
            $st->bindValue(":filaInicio", $filaInicio, PDO::PARAM_INT);
            $st->bindValue(":numeroFilas", $numeroFilas, PDO::PARAM_INT);
            $st->execute();
            $usuarios = array();
            foreach ($st->fetchAll() as $fila) {
                $usuarios[] = new Usuario($fila);
            }
            $st = $conexion->query("SELECT found_rows() AS filasTotales");
            $fila = $st->fetch();
            parent::desconectar($conexion);
            return array($usuarios, $fila["filasTotales"]);
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }

    public static function obtenerUsuario($id) {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM " . TABLA_USUARIOS . " WHERE ID_USUARIO = :id";
        try {
            $st = $conexion->prepare($sql);
            $st->bindValue(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $fila = $st->fetch();
            parent::desconectar($conexion);
            if ($fila)
                return new Usuario($fila);
            else
                return 0;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function nuevoMiembro($email, $nombre, $apellidos, $pass,$direct,$tlf,$url,$dep,$centro,$uni,$dir) {
        $passwordHash = sha1($pass);
        $conexion = parent::conectar();
        $sql = "INSERT INTO " . TABLA_MIEMBROS . "(EMAIL,NOMBRE,APELLIDOS,PASSWORD,ES_DIRECTOR,TELEFONO,URL,DEPARTAMENTO,CENTRO,UNIVERSIDAD,DIRECCION) VALUES (:email,:nombre,:apellidos,:pass,:director,:tlf,:url,:dep,:cent,:univ,:dir)";
        $ok = false;
        
        
        
        try {
            $st = $conexion->prepare($sql);
            $st->bindValue(":email", $email, PDO::PARAM_STR);
            $st->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $st->bindValue(":apellidos", $apellidos, PDO::PARAM_STR);
            $st->bindValue(":pass", $passwordHash, PDO::PARAM_STR);
            $st->bindValue(":director", $direct, PDO::PARAM_STR);
            $st->bindValue(":tlf", $tlf, PDO::PARAM_STR);
            $st->bindValue(":url", $url, PDO::PARAM_STR);
            $st->bindValue(":dep", $dep, PDO::PARAM_STR);
            $st->bindValue(":cent", $centro, PDO::PARAM_STR);
            $st->bindValue(":univ", $uni, PDO::PARAM_STR);
            $st->bindValue(":dir", $dir, PDO::PARAM_STR);
            $st->execute();
            parent::desconectar($conexion);
            $ok = true;
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
        return $ok;
    }

    public static function login($usuario, $pass) {
        $conexion = parent::conectar();
        $passwordHash = sha1($pass);
        $query = "SELECT * FROM " . TABLA_MIEMBROS . " WHERE EMAIL='".$usuario."' AND PASSWORD='".$passwordHash."'";
        try {
            $st = $conexion->prepare($query);
            $st->execute();
            $fila = $st->rowCount();
            parent::desconectar($conexion);
            if ($fila) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $exc) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $exc->getMessage());
        }
    }

}

?>