<?php 

    require_once("../Controller/Controller.php");
    $controller=new Controller();
    $titre=$_POST['title'];
    $bgColor=$_POST['primaryColor'];
    $bdColor=$_POST['secondaryColor'];
    $textColor=$_POST['textColor'];
    $font=$_POST['font'];
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $n=count($_FILES['files']['name']);
    for ($i=0;$i<$n;$i++) {
        $new_path='../../UploadedImages/diapo'.($i+1).'.jpg';
        move_uploaded_file($_FILES['files']['tmp_name'][$i],$new_path);
    }
    $id= $controller->addTheme($titre,$bgColor,$bdColor,$textColor,$font);
    $controller->updateTheme($id);

   
?>