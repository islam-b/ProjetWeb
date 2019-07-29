<?php
    require_once("../Controller/Controller.php");
    $controller=new Controller();
    $theme=$controller->getTheme();
    echo json_encode($theme);
?>