<?php include 'inc/head.php'?>
<body>
<?php 
    include 'inc/header.php';
    include 'inc/nav.php';
    if(isset($_SESSION['usuario']) and $_SESSION['admin']){
        echo "<article id='contenido'>";
        include 'php/list_log.php';
        echo '</article>';
    }
    else include 'inc/error.html' ;
    include 'inc/footer.html'?>
</body>
</html>