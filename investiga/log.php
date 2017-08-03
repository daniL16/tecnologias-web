<?php include 'inc/head.php'?>
<body>
<?php include 'inc/header.php' ?>
<?php include 'inc/nav.php' ?>
<?php    if(isset($_SESSION['usuario']) and $_SESSION['admin'])
    echo
'<article id="contenido">
<?php include "php/list_log.php" ?>
</article>';
else include 'inc/error.html'?>
<?php include 'inc/footer.html'?>
</body>
</html>