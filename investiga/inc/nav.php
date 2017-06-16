<aside id="nav">
    <ul>
        <li><a href="/~daniellg1617/investiga/index.php">Inicio</a></li>
        <li><a href="/~daniellg1617/investiga/miembros.php">Miembros</a></li>
        <li><a href="/~daniellg1617/investiga/publicaciones.php">Publicaciones</a></li>
        <li><a href="/~daniellg1617/investiga/proyectos.php">Proyectos</a></li>
        <?php
        //session_start();
        if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autenticado'){
            echo "<li><a href='/~daniellg1617/investiga/registrar_publicacion.php'>Añadir publicación</a></li>";
            echo "<li><a href='/~daniellg1617/investiga/registrar_proyecto.php'>Añadir proyecto</a></li>";
            if($_SESSION['admin']){
               echo "<li><a href='/~daniellg1617/investiga/miembros.php'>Editar usuario</a></li>";
               echo "<li><a href='/~daniellg1617/investiga/log.php'>Ver log</a></li>";
               echo "<li><a href='/~daniellg1617/investiga/php/backup.php'>Realizar un backup</a></li>";
               echo "<li><a href='/~daniellg1617/investiga/php/restaurarBD.php'>Restaurar BD</a></li>" ;
            }
        }
        ?>
        <li><a href="/~daniellg1617/doc/documentacion.pdf">Documentación</a></li>
        
    </ul>
</aside>