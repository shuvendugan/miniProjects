<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// opcache_reset();
define('APP_ROOT',__dir__);

// echo APP_ROOT;
require_once(APP_ROOT.'/vendor/autoload.php');

//for autoload all file when I create a object of that class
spl_autoload_register(function($class){
    $classFile = str_replace('\\',DIRECTORY_SEPARATOR,$class.'.php');
    //
    $classPath = APP_ROOT.'/app/'.$classFile;

    if(file_exists($classPath)){
        require_once($classPath);
    }

});

session_start();
use App\Services\Route;
$route = new Route();

require_once(APP_ROOT.'/Routes/route.php');

$route->handle();
