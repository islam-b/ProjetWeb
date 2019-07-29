<?php
    require_once("../Controller/Controller.php");
    $controller=new Controller();
    $theme=$controller->getThemes();
    echo json_encode($theme);
?>