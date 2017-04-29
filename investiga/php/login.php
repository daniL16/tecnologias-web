<?php

session_start();

require_once('db.php');

if (isset($_POST["login"])) {
    if (!empty($_POST['user']) && !empty($_POST['pass'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $db = DB_conexion();
        $login = DB_login($db,$username,$password);
        DB_desconexion($db);
       
        if ($login) {
                echo "LOGED";
                $_SESSION['usuario'] = $username; 
                $_SESSION['estado'] = 'Autenticado';
                $_SESSION['admin'] = $login['admin'];
                header('Location:' . getenv('HTTP_REFERER'));
        }
        else{
            
            echo "FAIL"; 
            //header('Location:' . getenv('HTTP_REFERER')); 
        }
    } else {
         //header('Location:' . getenv('HTTP_REFERER'));
         //echo "<script language='javascript'>  alert('login incorrecto'); </script>";
       
    }
    
  }

?>
