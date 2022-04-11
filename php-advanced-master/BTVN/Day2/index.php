<?php

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'User';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$fullControllerName = ucfirst($controller) . "Controller"; //ProductController
// die($fullControllerName); //ProductController.php

// $productController = new ProductController();
//$productController->index();
/**
 * TODO: 
 * class ProductController {
 *  public function create()
 * {
 * }
 * }
 */
require("./Controllers/$fullControllerName.php");

$controllerInstance = new $fullControllerName();
$controllerInstance->$action();

// MVC
// Bước 1: index.php (routing) -> controller ==> ok
// Bước 2: Controller -> Model (Controller call models) để lấy dữ liệu xử lí
// Bước 3: Load từ controller -> view (dữ liệu controller lấy từ model);