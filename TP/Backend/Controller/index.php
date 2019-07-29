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
        require_once("../View/View.php");
        $view=new View();
        if (isset($_POST['id_ecole'])) {
            $id_ecole=$_POST['id_ecole'];
            if (isset($_SESSION['username'])&&($_SESSION['username']=='admin')) {

                $view->showLogout();
                $view->showTitle($id_ecole);
                $view->showForm($id_ecole);
                $view->showFormations($id_ecole);
                $view->showPanel();
                $view->showThemes();
            } else {
                $view->showLogin();
                $view->showCadre();
                $view->showMessage();
            }
        }

        
        ?>
        
    </body>
    
</html>
