<?php
require '../../../../Slim/Slim.php';
\Slim\Slim::registerAutoloader();

if(empty($_FILES['file-code']))
    header('HTTP/1.0 404 Not Found');

$infos = explode(':::',file_get_contents($_FILES['file-code']['tmp_name']));

$strCode = array();

foreach($infos as $k=>$r){
    if(strtoupper($r) == 'TITLE')
        $strCode['title'] = $infos[$k+1];
    else if(strtoupper($r) == 'DESCRIPTION')
        $strCode['description'] = $infos[$k+1];
    else if(strtoupper($r) == 'CONTENT')
        $strCode['content'] = $infos[$k+1];
}

$fn = new \libs\functions;
$db = new modules\admin\code\model\DBCode;

$db->insertCode($fn->prepareArrayDoublePointer($strCode));


echo json_encode($strCode);
