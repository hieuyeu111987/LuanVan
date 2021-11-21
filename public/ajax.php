<?php

//Include Google Configuration File
require_once __DIR__ . '/../gconfig.php';
require_once __DIR__ . '/../application/config/path.php';

if (isset($_REQUEST['controller'])) {
    $controller = $_REQUEST['controller'];
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';
    $requestURL = "$controller-$action";
    require controllers . $controller . '.php';
    $controller = new $controller();
    $controller->$action();
}
