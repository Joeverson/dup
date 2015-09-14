<?php
require '../../../../Slim/Slim.php';
\Slim\Slim::registerAutoloader();

if(empty($_POST))
    header('HTTP/1.0 404 Not Found');


$db = new modules\admin\code\model\DBCode;

$db->deleteCode($_POST['id']);
