<?php
require 'config.php';

function __autoload($className)
{
    $fileName = "{$className}.php";

    if (file_exists(LIB_DIR . $fileName)) {
        require LIB_DIR . $fileName;
    } elseif (file_exists(CONTROLLER_DIR . $fileName)) {
        require CONTROLLER_DIR . $fileName;
    } else {
        die("File {$fileName} not found");
    }
}

$request = new Request();
$route = $request->get('route'); // $route = $_GET['route'];

if (!$route) {
    $route = 'index/index';
}

$route = explode('/', $route);

// TODO!
$controller = ucfirst($route[0]) . 'Controller'; // like BookController
$action = $route[1] . 'Action'; // like showAction, indexAction

$controller = new $controller();

if (!method_exists($controller, $action)) {
    die("{$action} not found");
}

$content = $controller->$action($request);

require VIEW_DIR . 'layout.phtml';