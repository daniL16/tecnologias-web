<?php

require_once ('datosObject.class.inc');

class Usuarios extends DataObject {

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

    public static function insertarUsuario($id, $nombre, $apellidos, $pass, $dir, $ciudad, $cp, $prov, $email, $dni, $visa, $cad) {
        $conexion = parent::conectar();
        $sql = "INSERT INTO " . TABLA_USUARIOS . " VALUES (:id,:nombre,:apellidos,:pass,:dir,:ciudad,:cp,:prov,:email,:dni,:visa,:cad)";
        $ok = false;
        try {
            $st = $conexion->prepare($sql);

            $st->bindValue(":id", $id, PDO::PARAM_STR);
            $st->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $st->bindValue(":apellidos", $apellidos, PDO::PARAM_STR);
            $st->bindValue(":pass", $pass, PDO::PARAM_STR);
            $st->bindValue(":dir", $dir, PDO::PARAM_STR);
            $st->bindValue(":ciudad", $ciudad, PDO::PARAM_STR);
            $st->bindValue(":cp", $cp, PDO::PARAM_INT);
            $st->bindValue(":prov", $prov, PDO::PARAM_STR);
            $st->bindValue(":email", $email, PDO::PARAM_STR);
            $st->bindValue(":dni", $dni, PDO::PARAM_STR);
            $st->bindValue(":visa", $visa, PDO::PARAM_INT);
            $st->bindValue(":cad", $cad, PDO::PARAM_STR);
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
        $query = "SELECT * FROM " . TABLA_USUARIOS . " WHERE ID_USUARIO='".$usuario."' AND CLAVE='".$pass."'";
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