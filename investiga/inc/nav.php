<aside id="nav">
    <ul>
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="../miembros.php">Miembros</a></li>
        <li><a href="../publicaciones.php">Publicaciones</a></li>
        <li><a href="../proyectos.php">Proyectos</a></li>
        <?php
        
        if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autenticado'){
            echo "<li><a href=>Añadir/editar publicación</a></li>";
            echo "<li><a href=>Añadir/editar proyecto</a></li>";
            if($_SESSION['usuario'] == 'admin'){
               echo "<li><a href=>Editar usuario</a></li>";
               echo "<li><a href=>Ver log</a></li>";
               echo "<li><a href=>Realizar un backup</a></li>";
               echo "<li><a href=>Restaurar BD</a></li>" ;
            }
        }
        ?>
        
    </ul>
</aside>