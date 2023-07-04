<?php
require_once 'model/database.php';
$controller2 = 'curso';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "controller/$controller2.controller.php";
    $controller2 = ucwords($controller2) . 'Controller';
    $controller2 = new $controller2;
    $controller2->Index();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller2 = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
    require_once "controller/$controller2.controller.php";
    $controller2 = ucwords($controller2) . 'Controller';
    $controller2 = new $controller2;
    
    // Llama la accion
    call_user_func( array( $controller2, $accion ) );
}
