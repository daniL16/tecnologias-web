<?php

session_start();

require_once('./usuarios.class.inc');
include('../view/head.html');

if (isset($_SESSION["session_username"])) {
    echo "Session is set";
    //header("Location:/index.php");
}

if (isset($_POST["login"])) {

    if (!empty($_POST['user']) && !empty($_POST['pwd'])) {
        $username = $_POST['user'];
        $password = $_POST['pwd'];
        $login = Usuarios::login($username, $password);

        if ($login) {
            
     $_SESSION['usuario'] = $username; 
     $_SESSION['estado'] = 'Autenticado';
     header('Location:' . getenv('HTTP_REFERER'));
        } else {
            $message = "Nombre de usuario ó contraseña invalida!";
            header("Location: ../login_page.php");
        }
    } else {
        $message = "Todos los campos son requeridos!";
    }
    
    if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} 
}
?>
