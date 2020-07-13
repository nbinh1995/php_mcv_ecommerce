<?php
session_start();
include 'core/autoload.php';
function view($name, $data = []) 
    {
    extract($data);
    return require_once "view/{$name}.php";
    }

function redirect($path = null)
    {
    header("Location: /{$path}");
    }
core_libs_Router::load('routes.php')
    ->direct(core_libs_Request::uri(), core_libs_Request::method());
   
?>