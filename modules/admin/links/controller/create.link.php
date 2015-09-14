<?php
/*
 *
 * */
require '../../../../Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$db = new \modules\admin\links\model\DBLinks;
$fn = new \libs\functions;

$db->insertLinks($fn->prepareArrayDoublePointer($_POST, false));