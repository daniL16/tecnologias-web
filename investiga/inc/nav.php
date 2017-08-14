<aside id="nav">
    <ul>
        <li><a class='enlaceboton' href="/~daniellg1617sep/investiga/index.php">Inicio</a></li>
        <li><a class='enlaceboton' href="/~daniellg1617sep/investiga/miembros.php">Miembros</a></li>
        <li><a class='enlaceboton' href="/~daniellg1617sep/investiga/publicaciones.php">Publicaciones</a></li>
        <li><a class='enlaceboton' href="/~daniellg1617sep/investiga/proyectos.php">Proyectos</a></li>
        <?php
        if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autenticado'){
            echo "<li id='add'>Añadir
                  <ul id='submenu_add'>
                    <li><a class='enlaceboton' href='/~daniellg1617sep/investiga/registrar_publicacion.php'>Añadir publicación</a></li>
                    <li><a class='enlaceboton' href='/~daniellg1617sep/investiga/registrar_proyecto.php'>Añadir proyecto</a></li></ul></li>";
            if($_SESSION['admin']){
               echo "<li id='admin'>Tareas de administracion
                     <ul id='submenu_admin'>
                        <li><a class='enlaceboton' href='/~daniellg1617sep/investiga/log.php'>Ver log</a></li>
                        <li><a class='enlaceboton' href='/~daniellg1617sep/investiga/php/backup.php'>Realizar un backup</a></li>
                        <li><a class='enlaceboton' href='/~daniellg1617sep/investiga/php/restaurarBD.php'>Restaurar BD</a></li>
                    </ul></li>";
            }
        }
        ?>
        <li><a class='enlaceboton' href="/~daniellg1617sep/investiga/doc/documentacion.pdf">Documentación</a></li>
        
    </ul>
</aside>