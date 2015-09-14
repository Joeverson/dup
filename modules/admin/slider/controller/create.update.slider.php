<?php
/*
 * 1 = imagem do slider inicial do site
 *
 * */
require '../../../../Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$db = new \modules\admin\slider\model\DBSlide;
$fn = new \libs\functions;
var_dump($_FILES);

if(move_uploaded_file($_FILES['fileImg']['tmp_name'], '../../../includes/img/'.$_FILES['fileImg']['name']))
    if($sl = $db->existSlider(1))//olhar oque é esse um lá em cima.^
        $db->updateSlider(array('url'=>$_FILES['fileImg']['name'],'id_slider'=>$sl['id_slider']));
    else
        $db->insertSlide(array(':url' => $_FILES['fileImg']['name']));