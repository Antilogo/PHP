<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$fullControllerName = ucfirst($controller) . "Controller";

require("./Controllers/$fullControllerName.php");

$controllerInstance = new $fullControllerName();
$controllerInstance->$action();
