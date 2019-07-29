<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" charset="utf-8">
        <meta http-equiv="Pragma" content="no-cache">
        <title>TP Ecole privee</title>
        <link href="../View/style.css" rel="stylesheet" type="text/css">
        <script src="../../jquery-3.3.1.js"></script>
        <script src="../View/script.js"></script>
    </head>
    
    <body>
       <?php
        require("../View/indexView.php");
        $view=new View();

       if (isset($_POST['id_ecole'])) {
           $id_ecole=$_POST['id_ecole'];
           if ((empty($_SESSION['username']))) {
            $view->showLogin();
            $view->showCadre();
            }
            else {
             $view->showLogout();
            }
             $view->showTitle($_POST['id_ecole']);
           $view->showDiaporama();
           $view->showMenu($id_ecole);
           $view->showVideo();
           $view->showFormations($id_ecole);
           $view->showFooter();


       }
       else {


       }






      
        
        ?>
        
    </body>
</html>