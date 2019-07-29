<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="View/src/style.css">
    <script src="View/src/jquery/jquery-3.3.1.js"></script>
    <script src="View/src/bootstrap/js/bootstrap.js"></script>
    <script src="View/src/jquery.dataTables.min.js"></script>
    <script src="View/src/dataTables.bootstrap4.min.js"></script>
    <script src="View/src/script.js"></script>
    <link rel="stylesheet" href="View/src/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="View/src/dataTables.bootstrap4.min.css">
</head>
<body>
<div   id="BODY">
    <?php
    require_once('View/View.php');
    $view=new View();
    $view->showLogo();
    $view->showDiaporama();
    $view->showMenu(7);
    $view->showCadreConnex();
    $view->showCadreInscription();
    $view->showComparaison();
    $view->showFooter();
    ?>
</div>
</body>
</html>