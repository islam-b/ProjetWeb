<?php 

        require_once("../Controller/Controller.php");
            $controller=new Controller();
            $type=$_POST['type'];
        if ($type!=0) {
            
            $id_type=$_POST['id_type'];
            $nom_type=$_POST['nom_type'];
            $volume=$_POST['volume'];
            $prixHT=$_POST['prixHt'];
            $taxe=$_POST['taxe'];
            echo $controller->updateType($id_type,$nom_type,$volume,$prixHT,$taxe);
            
        }
        else {
            $id_form=$_POST['id_form'];
            $nom_form=$_POST['nom_form'];
            $controller->updateForm($id_form,$nom_form);
        }
?>