<?php
require_once 'model/database.php';
$controller2 = 'usuario';
require_once "controller/$controller2.controller.php";
$controller2 = ucwords($controller2) . 'Controller';
$controller2 = new $controller2;

if(isset($_GET['page'])){
    $page = $_GET['page'];
    
}
switch($page){
    case 'login':
        
        $controller2->Autenticar();
        break;
    default : 
        $controller2->Index();    
        
        break;
}
