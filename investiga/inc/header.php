
<header>
    <section id="titulo">
        <img src="../img/logo.jpeg" class="logo">
        <h1>Grupo de Investigación</h1>
    </section>
    <section id="login">
     <?php
       session_start();
       if(!isset($_SESSION['usuario'])){
        echo "
        <form action='./php/login.php' id='login_form' method='POST'>
        <input type='text' name='user'>
        <input type='password' name='pass'>
        <input type='submit' name='login' value='Entrar'>
    </form>";
       }
      else{
          echo "<p id='login_form'>Logeado como ".$_SESSION['usuario']."<a href='./php/logout.php'>       Cerrar sesión</a></p>"
                ;
      }
    ?>
    </section>    
</header>

    