<?php

session_start();

require_once('./usuarios.class.inc');

if (isset($_SESSION["session_username"])) {
    echo "Session is set";
    //header("Location:/index.php");
}

if (isset($_POST["login"])) {
    if (!empty($_POST['user']) && !empty($_POST['pass'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $login = Usuarios::login($username, $password);
        // Tienes que comprobar si esta bloqueado.
        if ($login) {
            $_SESSION['usuario'] = $username; 
            $_SESSION['estado'] = 'Autenticado';
              
            header('Location:' . getenv('HTTP_REFERER'));
        } else {
                $message = "Nombre de usuario ó contraseña invalida!";
                //header("Location: ../login_page.php");
        }
    } else {
         //header('Location:' . getenv('HTTP_REFERER'));
         echo "<script language='javascript'>  alert('login incorrecto'); </script>";
       
    }
    
    
}
?>
