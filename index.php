<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="Frontend/View/src/style.css">
    <script src="Frontend/View/src/jquery/jquery-3.3.1.js"></script>
    <script src="Frontend/View/src/bootstrap/js/bootstrap.js"></script>
    <script src="Frontend/View/src/jquery.dataTables.min.js"></script>
    <script src="Frontend/View/src/dataTables.bootstrap4.min.js"></script>
    <script src="Frontend/View/src/script.js"></script>
    <link rel="stylesheet" href="Frontend/View/src/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Frontend/View/src/dataTables.bootstrap4.min.css">
</head>
<body>
<div   id="BODY">
<?php
require_once('Frontend/View/View.php');
$view=new View();
$view->showLogo();
$view->showDiaporama();
$view->showMenu(0);
$view->showCadreConnex();
$view->showCadreInscription();
$view->showContent();
$view->showFooter();
?>
</div>
</body>
</html>
