<?php 
            require_once("../Controller/Controller.php");
            $controller=new Controller();
            $id_to_delete=$_POST['id'];
            $type=$_POST['type'];

            if ($type>0) {
                $controller->deleteType($id_to_delete);
            }
            else {
                $controller->deleteFormation($id_to_delete);
            }
?>